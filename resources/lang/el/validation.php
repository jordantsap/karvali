<?php
return [
    'accepted'             => 'Πρέπει να αποδεχτείτε το πεδίο :attribute της φόρμας.',
    'active_url'           => 'Το πεδίο :attribute δεν είναι αποδεκτό url.',
    'after'                => 'Το πεδίο :attribute πρέπει να είναι ημερομηνία μετά απο το :date.',
    'after_or_equal'       => 'Το πεδίο :attribute δεν είναι ημερομηνία μετά ή ίση από :date.',
    'alpha'                => 'Στο :attribute επιτρέπονται μόνο γράμματα της αλφαβήτου.',
    'alpha_dash'           => 'Το :attribute μπρεί να περίεχει μόνο γράματα, νούμερα και παύλες (-).',
    'alpha_num'            => 'Το :attribute δέχεται μόνο γράμματα και αριθμούς.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'Στο :attribute εισάγετε ημερομηνία πρίν :date.',
    'before_or_equal'      => 'Στο :attribute εισάγετε ημερομηνία προηγούμενη ή ίση με :date.',
    'between'              => [
        'numeric' => 'Το :attribute να είναι μεταξύ του :min και του :max.',
        'file'    => 'Το :attribute να είναι μεταξύ :min και :max μεγέθους.',
        'string'  => 'Το :attribute να είναι απο :min έως :max χαραχτήρες.',
        'array'   => 'Το :attribute να είναι μεταξύ :min και :max.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'Η επιβεβαίωση του :attribute δε ταιριάζει.',
    'date'                 => 'Μή αποδεκτή ημερομηνία στο :attribute.',
    'date_format'          => 'Στο :attribute πρέπει να εισάγετε τύπο :format.',
    'different'            => 'Το :attribute και το :other πρέπει να είναι διαφορετικά.',
    'digits'               => 'Το :attribute πρέπει να είναι :digits digits.',
    'digits_between'       => 'Το :attribute πρέπει να είναι μεταξύ :min και :max ψηφίων.',
    'dimensions'           => 'Στο :attribute υπάρχουν μη αποδεχτές διαστάσεις.',
    'distinct'             => 'Το :attribute υπάρχει ήδη.',
    'email'                => 'Το :attribute δεν είναι αποδεχτό.',
    'exists'               => 'Η επιλογή του :attribute δεν είναι αποδεκτή.',
    'file'                 => 'Το :attribute πρέπει να είναι αρχείο.',
    'filled'               => 'Το :attribute πρέπει να έχει κάποια τιμή.',
    'image'                => 'Το :attribute πρέπει να είναι εικόνα.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'Το :attribute δέχετε μόνο αριθμούς.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'Το :attribute δε πρέπει να ειναι μεγαλύτερο απο :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'Το :attribute δε μπορεί να είναι μεγαλύτερο απο :max χαραχτήρες.',
        'array'   => 'Το :attribute δε πρέπει να είναι μεγαλύτερο απο :max.',
    ],
    'mimes'                => 'Το :attribute μπορεί να είναι μόνο τύπος :values.',
    'mimetypes'            => 'Το :attribute μπορεί να είναι μόνο τύπος: :values.',
    'min'                  => [
        'numeric' => 'Το :attribute πρέπει να είναι τουλάχιστον :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'Το :attribute πρέπει να είναι αριθμός.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'Ο τύπος του :attribute δεν είναι αποδεχτός.',
    'required'             => 'Το πεδίο :attribute απαιτείται.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'Το :attribute και το :other πρέπει να είναι ίδια.',
    'size'                 => [
        'numeric' => 'Το :attribute πρέπει να είναι :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'Το :attribute πρέπει να είναι :size χαραχτήρες.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'Το :attribute υπάρχει ήδη, διαλέξτε διαφορετικό.',
    'uploaded'             => 'Το :attribute απαίτειχε να ανέβει.',
    'url'                  => 'Ο τύπος του :attribute δεν ειναι αποδεκτός.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
