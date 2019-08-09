<?php

namespace Miyt\SymfonyBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class CuitCuilValidator extends ConstraintValidator {

   public function validate($value, Constraint $constraint) {
       
       if(empty($value))
           return;
       
       if (!is_numeric($value)) {
           $this->context->buildViolation($constraint->message)->addViolation();
           return;
       }
       
       if (mb_strlen($value) < 11) {
           $this->context->buildViolation($constraint->message)->addViolation();
           return;
       }

       if (mb_strlen($value) == 11) {
           $cadena = str_split($value);
           $result = $cadena[0] * 5;
           $result += $cadena[1] * 4;
           $result += $cadena[2] * 3;
           $result += $cadena[3] * 2;
           $result += $cadena[4] * 7;
           $result += $cadena[5] * 6;
           $result += $cadena[6] * 5;
           $result += $cadena[7] * 4;
           $result += $cadena[8] * 3;
           $result += $cadena[9] * 2;
           $div = intval($result / 11);
           $resto = $result - ($div * 11);
           if ($resto == 0) {
               if ($resto != $cadena[10]) {
                   $this->context->buildViolation($constraint->message)->addViolation();
                   return;
               }
           } elseif ($resto == 1) {
               if ($cadena[10] != 9 || $cadena[0] != 2 || $cadena[1] != 3) {
                   $this->context->buildViolation($constraint->message)->addViolation();
                   return;
               }
               if ($cadena[10] != 4 || $cadena[0] != 2 || $cadena[1] != 3) {
                   $this->context->buildViolation($constraint->message)->addViolation();
                   return;
               }
           } elseif ($cadena[10] != (11 - $resto)) {
               $this->context->buildViolation($constraint->message)->addViolation();
               return;
           }
       }
   }
}