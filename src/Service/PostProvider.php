<?php

declare(strict_types=1);

namespace App\Service;

class PostProvider{
    public function transformDataForTwig(array $wpisy): array{
        $transformedData = [];
        foreach($wpisy as $wpis){
            $transformedData['wpisy'][] = [
                'id' => $wpis->getId(),
                'title' => $wpis->getTitle(),
                'category' => $wpis->getCategory(),
                'content' => substr($wpis->getContent(), 0, 30).'...',
                'dateAdded' => $wpis->getDateAdded(),
                'link' => 'wpis/'.$wpis->getId(),
            ];
        }

        return $transformedData;
    }
}