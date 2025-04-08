<?php

namespace Tests\Flag;

use Hibit\Flag\Folder;
use Hibit\Flag\Format;

use PHPUnit\Framework\TestCase;

final class FolderTest extends TestCase
{
    public function test_get_flag_folder()
    {
        $this->assertSame(Folder::H20, Folder::getByFormat(Format::H20));
        $this->assertSame(Folder::H24, Folder::getByFormat(Format::H24));
        $this->assertSame(Folder::W20, Folder::getByFormat(Format::W20));
        $this->assertSame(Folder::W40, Folder::getByFormat(Format::W40));
        $this->assertSame(Folder::SVG, Folder::getByFormat(Format::SVG));
    }
}
