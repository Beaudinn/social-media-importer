<?php

namespace Codenetix\SocialMediaImporter\Importers;

use Codenetix\SocialMediaImporter\Adapters\DraugiemMediaAdapter;
use Codenetix\SocialMediaImporter\FactoryMethods\MediaFactoryMethod;

/**
 * @author Andrey Vorobiov<andrew.sprw@gmail.com>
 */
class DraugiemSingleMediaImporter extends ADraugiemMediaImporter
{

    public function importByURL($url)
    {
        $id = $this->getIdFromURL($url);
        $item = $this->draugiemClient->apiCall('rasens/item', ['pid'=> $id]);

        return (new DraugiemMediaAdapter($item['item']))->transform(new MediaFactoryMethod());
    }

    private function getIdFromURL($url)
    {
        preg_match('/^https:\/\/(?:www)?\.draugiem\.lv\/(?:[\w]+\/)?gallery\/\?pid=([0-9]+)/', $url, $result);
        return $result[1];
    }
}