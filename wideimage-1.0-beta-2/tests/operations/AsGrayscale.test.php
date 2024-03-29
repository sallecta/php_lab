<?php
	/**
    This file is part of WideImage.
		
    WideImage is free software; you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation; either version 2.1 of the License, or
    (at your option) any later version.
		
    WideImage is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.
		
    You should have received a copy of the GNU Lesser General Public License
    along with WideImage; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
  **/
	
	class AsGrayscaleTest extends ImageTester
	{
		function testTransparentGif()
		{
			$img = wiImage::load(IMG_PATH . '100x100-color-hole.gif');
			
			$gray = $img->asGrayscale();
			$this->assertTrue($gray instanceof wiPaletteImage);
			
			$this->assertEqual(100, $gray->getWidth());
			$this->assertEqual(100, $gray->getHeight());
			
			$this->assertRGBNear($gray->getRGBAt(10, 10), 227, 227, 227);
			$this->assertRGBNear($gray->getRGBAt(90, 10), 28, 28, 28);
			$this->assertRGBNear($gray->getRGBAt(90, 90), 150, 150, 150);
			$this->assertRGBNear($gray->getRGBAt(10, 90), 76, 76, 76);
			
			// preserves transparency
			$this->assertTrue($gray->isTransparent());
			$this->assertEqual($gray->getColorAt(50, 50), $gray->getTransparentColor());
		}
		
		function testPNGAlpha()
		{
			$img = wiImage::load(IMG_PATH . '100x100-blue-alpha.png');
			
			$gray = $img->asGrayscale();
			$this->assertTrue($gray instanceof wiTrueColorImage);
			$this->assertEqual(100, $gray->getWidth());
			$this->assertEqual(100, $gray->getHeight());
			
			$this->assertRGBNear($gray->getRGBAt(25, 25), 29, 29, 29, 32);
			$this->assertRGBNear($gray->getRGBAt(75, 25), 29, 29, 29, 64);
			$this->assertRGBNear($gray->getRGBAt(75, 75), 29, 29, 29, 96);
			$this->assertRGBNear($gray->getRGBAt(25, 75), 0, 0, 0, 127);
			
			$this->assertFalse($gray->isTransparent());
		}
	}
?>