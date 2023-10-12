<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class QuestionFilter extends ApiFilter {
    protected $safeParms = [
        'title' => ['eq']
    ];

    protected $columnMap = [

    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];

}