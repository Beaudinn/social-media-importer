<?php

namespace tests;

use Codenetix\SocialMediaImporter\Importers\YoutubeSingleMediaImporter;
use PHPUnit\Framework\TestCase;

class YoutubeSocialMediaImporterTest extends TestCase
{
    public function testGetMediaByLink()
    {
        $importer = new YoutubeSingleMediaImporter();
        $result = $importer->importByURL('https://www.youtube.com/watch?v=TbLXpaTHbig');
        $this->assertNotEmpty($result);
    }

    public function testGetMediaByLink2()
    {
        $importer = new YoutubeSingleMediaImporter();
        $result = $importer->importByURL('https://www.youtube.com/embed/RVCTV8D_UaE');
        $this->assertNotEmpty($result);
    }

    public function testGetMediaByLink3()
    {
        $importer = new YoutubeSingleMediaImporter();
        $result = $importer->importByURL('https://youtu.be/0_qTxNIQy7I');
        $this->assertNotEmpty($result);
    }
}
