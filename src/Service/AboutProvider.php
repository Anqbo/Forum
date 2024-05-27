<?php

declare(strict_types=1);

namespace App\Service;

class AboutProvider{
    public function transformDataForTwig(array $infos): array{
        $transformedData = [];
        foreach($infos as $info){
            $transformedData['infos'][] = [
                'key' => $info->getKey(),
                'value' => $info->getValue()
            ];
        }

        return $transformedData;
    }
}