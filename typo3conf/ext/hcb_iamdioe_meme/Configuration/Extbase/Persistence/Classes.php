<?php
declare(strict_types = 1);

return [
    \HcbIamDioeMeme\HcbIamdioeMeme\Domain\Model\FileReference::class => [
        'tableName' => 'sys_file_reference',
        'properties' => [
					 'title' => [
							 'fieldName' => 'title'
					 ],
					 'path' => [
							 'fieldName' => 'path'
					 ],
					 'isAbsolutePath' => [
							 'fieldName' => 'base'
					 ],
        ],
    ],
];
