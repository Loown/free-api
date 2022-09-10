<?php

namespace App\Console\Commands\Traits;

use Illuminate\Support\Facades\Validator;

trait CanValidateInput {

    protected function askValid($question, $field, $rules, $type = 'ask')
    {
        if ($type === 'ask') {
            $value = $this->ask($question);
        }

        if ($type === 'secret') {
            $value = $this->secret($question);
        }

        if($message = $this->validateInput($rules, $field, $value)) {
            $this->error($message);

            return $this->askValid($question, $field, $rules, $type);
        }

        return $value;
    }


    protected function validateInput($rules, $fieldName, $value)
    {
        $validator = Validator::make([
            $fieldName => $value
        ], [
            $fieldName => $rules
        ], [
            'required' => 'Définir la valeur.',
            'unique' => 'Existe déjà en base.',
            'email' => 'Ceci n\'est pas un email.',
            'min' => 'Dois comporter au minimum :min caractères.',
            'max' => 'Dois comporter au maximum :max caractères.',
        ]);

        return $validator->fails()
            ? $validator->errors()->first($fieldName)
            : null;
    }

}