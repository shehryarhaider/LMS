<?php declare(strict_types=1);

namespace PhpParser\PrettyPrinter;

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\AssignOp;
use PhpParser\Node\Expr\BinaryOp;
use PhpParser\Node\Expr\Cast;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar;
use PhpParser\Node\Scalar\MagicConst;
use PhpParser\Node\Stmt;
use PhpParser\PrettyPrinterAbstract;

class Standard extends PrettyPrinterAbstract
{
    // Special nodes

    protected function pParam(Node\Param $node) {
        return ($node->type ? $this->p($node->type) . ' ' : '')
             . ($node->byRef ? '&' : '')
             . ($node->variadic ? '...' : '')
             . $this->p($node->var)
             . ($node->default ? ' = ' . $this->p($node->default) : '');
    }

    protected function pArg(Node\Arg $node) {
        return ($node->byRef ? '&' : '') . ($node->unpack ? '...' : '') . $this->p($node->value);
    }

    protected function pConst(Node\Const_ $node) {
        return $node->name . ' = ' . $this->p($node->value);
    }

    protected function pNullableType(Node\NullableType $node) {
        return '?' . $this->p($node->type);
    }

    protected function pIdentifier(Node\Identifier $node) {
        return $node->name;
    }

    protected function pVarLikeIdentifier(Node\VarLikeIdentifier $node) {
        return '$' . $node->name;
    }

    // Names

    protected function pName(Name $node) {
        return implode('\\', $node->parts);
    }

    protected function pName_FullyQualified(Name\FullyQualified $node) {
        return '\\' . implode('\\', $node->parts);
    }

    protected function pName_Relative(Name\Relative $node) {
        return 'namespace\\' . implode('\\', $node->parts);
    }

    // Magic Constants

    protected function pScalar_MagicConst_Class(MagicConst\Class_ $node) {
        return '__CLASS__';
    }

    protected function pScalar_MagicConst_Dir(MagicConst\Dir $node) {
        return '__DIR__';
    }

    protected function pScalar_MagicConst_File(MagicConst\File $node) {
        return '__FILE__';
    }

    protected function pScalar_MagicConst_Function(MagicConst\Function_ $node) {
        return '__FUNCTION__';
    }

    protected function pScalar_MagicConst_Line(MagicConst\Line $node) {
        return '__LINE__';
    }

    protected function pScalar_MagicConst_Method(MagicConst\Method $node) {
        return '__METHOD__';
    }

    protected function pScalar_MagicConst_Namespace(MagicConst\Namespace_ $node) {
        return '__NAMESPACE__';
    }

    protected function pScalar_MagicConst_Trait(MagicConst\Trait_ $node) {
        return '__TRAIT__';
    }

    // Scalars

    protected function pScalar_String(Scalar\String_ $node) {
        $kind = $node->getAttribute('kind', Scalar\String_::KIND_SINGLE_QUOTED);
        switch ($kind) {
            case Scalar\String_::KIND_NOWDOC:
                $label = $node->getAttribute('docLabel');
                if ($label && !$this->containsEndLabel($node->value, $label)) {
                    if ($node->value === '') {
                        return "<<<'$label'\n$label" . $this->docStringEndToken;
                    }

                    return "<<<'$label'\n$node->value\n$label"
                         . $this->docStringEndToken;
                }
                /* break missing intentionally */
            case Scalar\String_::KIND_SINGLE_QUOTED:
                return $this->pSingleQuotedString($node->value);
            case Scalar\String_::KIND_HEREDOC:
                $label = $node->getAttribute('docLabel');
                if ($label && !$this->containsEndLabel($node->value, $label)) {
                    if ($node->value === '') {
                        return "<<<$label\n$label" . $this->docStringEndToken;
                    }

                    $escaped = $this->escapeString($node->value, null);
                    return "<<<$label\n" . $escaped . "\n$label"
                         . $this->docStringEndToken;
                }
            /* break missing intentionally */
            case Scalar\String_::KIND_DOUBLE_QUOTED:
                return '"' . $this->escapeString($node->value, '"') . '"';
        }
        throw new \Exception('Invalid string kind');
    }

    protected function pScalar_Encapsed(Scalar\Encapsed $node) {
        if ($node->getAttribute('kind') === Scalar\String_::KIND_HEREDOC) {
            $label = $node->getAttribute('docLabel');
            if ($label && !$this->encapsedContainsEndLabel($node->parts, $label)) {
                if (count($node->parts) === 1
                    && $node->parts[0] instanceof Scalar\EncapsedStringPart
                    && $node->parts[0]->value === ''
                ) {
                    return "<<<$label\n$label" . $this->docStringEndToken;
                }

                return "<<<$label\n" . $this->pEncapsList($node->parts, null) . "\n$label"
                     . $this->docStringEndToken;
            }
        }
        return '"' . $this->pEncapsList($node->parts, '"') . '"';
    }

    protected function pScalar_LNumber(Scalar\LNumber $node) {
        if ($node->value === -\PHP_INT_MAX-1) {
            // PHP_INT_MIN cannot be represented as a literal,
            // because the sign is not part of the literal
            return '(-' . \PHP_INT_MAX . '-1)';
        }

        $kind = $node->getAttribute('kind', Scalar\LNumber::KIND_DEC);
        if (Scalar\LNumber::KIND_DEC === $kind) {
            return (string) $node->value;
        }

        $sign = $node->value < 0 ? '-' : '';
        $str = (string) $node->value;
        switch ($kind) {
            case Scalar\LNumber::KIND_BIN:
                return $sign . '0b' . base_convert($str, 10, 2);
            case Scalar\LNumber::KIND_OCT:
                return $sign . '0' . base_convert($str, 10, 8);
            case Scalar\LNumber::KIND_HEX:
                return $sign . '0x' . base_convert($str, 10, 16);
        }
        throw new \Exception('Invalid number kind');
    }

    protected function pScalar_DNumber(Scalar\DNumber $node) {
        if (!is_finite($node->value)) {
            if ($node->value === \INF) {
                return '\INF';
            } elseif ($node->value === -\INF) {
                return '-\INF';
            } else {
                return '\NAN';
            }
        }

        // Try to find a short full-precision representation
        $stringValue = sprintf('%.16G', $node->value);
        if ($node->value !== (double) $stringValue) {
            $stringValue = sprintf('%.17G', $node->value);
        }

        // %G is locale dependent and there exists no locale-independent alternative. We don't want
        // mess with switching locales here, so let's assume that a comma is the only non-standard
        // decimal separator we may encounter...
        $stringValue = str_replace(',', '.', $stringValue);

        // ensure that number is really printed as float
        return preg_match('/^-?[0-9]+$/', $stringValue) ? $stringValue . '.0' : $stringValue;
    }

    protected function pScalar_EncapsedStringPart(Scalar\EncapsedStringPart $node) {
        throw new \LogicException('Cannot directly print EncapsedStringPart');
    }

    // Assignments

    protected function pExpr_Assign(Expr\Assign $node) {
        return $this->pInfixOp(Expr\Assign::class, $node->var, ' = ', $node->expr);
    }

    protected function pExpr_AssignRef(Expr\AssignRef $node) {
        return $this->pInfixOp(Expr\AssignRef::class, $node->var, ' =& ', $node->expr);
    }

    protected function pExpr_AssignOp_Plus(AssignOp\Plus $node) {
        return $this->pInfixOp(AssignOp\Plus::class, $node->var, ' += ', $node->expr);
    }

    protected function pExpr_AssignOp_Minus(AssignOp\Minus $node) {
        return $this->pInfixOp(AssignOp\Minus::class, $node->var, ' -= ', $node->expr);
    }

    protected function pExpr_AssignOp_Mul(AssignOp\Mul $node) {
        return $this->pInfixOp(AssignOp\Mul::class, $node->var, ' *= ', $node->expr);
    }

    protected function pExpr_AssignOp_Div(AssignOp\Div $node) {
        return $this->pInfixOp(AssignOp\Div::class, $node->var, ' /= ', $node->expr);
    }

    protected function pExpr_AssignOp_Concat(AssignOp\Concat $node) {
        return $this->pInfixOp(AssignOp\Concat::class, $node->var, ' .= ', $node->expr);
    }

    protected function pExpr_AssignOp_Mod(AssignOp\Mod $node) {
        return $this->pInfixOp(AssignOp\Mod::class, $node->var, ' %= ', $node->expr);
    }

    protected function pExpr_AssignOp_BitwiseAnd(AssignOp\BitwiseAnd $node) {
        return $this->pInfixOp(AssignOp\BitwiseAnd::class, $node->var, ' &= ', $node->expr);
    }

    protected function pExpr_AssignOp_BitwiseOr(AssignOp\BitwiseOr $node) {
        return $this->pInfixOp(AssignOp\BitwiseOr::class, $node->var, ' |= ', $node->expr);
    }

    protected function pExpr_AssignOp_BitwiseXor(AssignOp\BitwiseXor $node) {
        return $this->pInfixOp(AssignOp\BitwiseXor::class, $node->var, ' ^= ', $node->expr);
    }

    protected function pExpr_AssignOp_ShiftLeft(AssignOp\ShiftLeft $node) {
        return $this->pInfixOp(AssignOp\ShiftLeft::class, $node->var, ' <<= ', $node->expr);
    }

    protected function pExpr_AssignOp_ShiftRight(AssignOp\ShiftRight $node) {
        return $this->pInfixOp(AssignOp\ShiftRight::class, $node->var, ' >>= ', $node->expr);
    }

    protected function pExpr_AssignOp_Pow(AssignOp\Pow $node) {
        return $this->pInfixOp(AssignOp\Pow::class, $node->var, ' **= ', $node->expr);
    }

    protected function pExpr_AssignOp_Coalesce(AssignOp\Coalesce $node) {
        return $this->pInfixOp(AssignOp\Coalesce::class, $node->var, ' ??= ', $node->expr);
    }

    // Binary expressions

    protected function pExpr_BinaryOp_Plus(BinaryOp\Plus $node) {
        return $this->pInfixOp(BinaryOp\Plus::class, $node->left, ' + ', $node->right);
    }

    protected function pExpr_BinaryOp_Minus(BinaryOp\Minus $node) {
        return $this->pInfixOp(BinaryOp\Minus::class, $node->left, ' - ', $node->right);
    }

    protected function pExpr_BinaryOp_Mul(BinaryOp\Mul $node) {
        return $this->pInfixOp(BinaryOp\Mul::class, $node->left, ' * ', $node->right);
    }

    protected function pExpr_BinaryOp_Div(BinaryOp\Div $node) {
        return $this->pInfixOp(BinaryOp\Div::class, $node->left, ' / ', $node->right);
    }

    protected function pExpr_BinaryOp_Concat(BinaryOp\Concat $node) {
        return $this->pInfixOp(BinaryOp\Concat::class, $node->left, ' . ', $node->right);
    }

    protected function pExpr_BinaryOp_Mod(BinaryOp\Mod $node) {
        return $this->pInfixOp(BinaryOp\Mod::class, $node->left, ' % ', $node->right);
    }

    protected function pExpr_BinaryOp_BooleanAnd(BinaryOp\BooleanAnd $node) {
        return $this->pInfixOp(BinaryOp\BooleanAnd::class, $node->left, ' && ', $node->right);
    }

    protected function pExpr_BinaryOp_BooleanOr(BinaryOp\BooleanOr $node) {
        return $this->pInfixOp(BinaryOp\BooleanOr::class, $node->left, ' || ', $node->right);
    }

    protected function pExpr_BinaryOp_BitwiseAnd(BinaryOp\BitwiseAnd $node) {
        return $this->pInfixOp(BinaryOp\BitwiseAnd::class, $node->left, ' & ', $node->right);
    }

    protected function pExpr_BinaryOp_BitwiseOr(BinaryOp\BitwiseOr $node) {
        return $this->pInfixOp(BinaryOp\BitwiseOr::class, $node->left, ' | ', $node->right);
    }

    protected function pExpr_BinaryOp_BitwiseXor(BinaryOp\BitwiseXor $ororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororororor