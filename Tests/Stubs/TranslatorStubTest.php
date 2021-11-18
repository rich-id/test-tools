<?php declare(strict_types=1);

namespace RichCongress\TestTools\Tests\Stubs;

use PHPUnit\Framework\TestCase;
use RichCongress\TestTools\Stubs\Symfony\TranslatorStub;

/**
 * Class TranslatorStubTest
 *
 * @package   RichCongress\TestTools\Tests\Stubs
 * @author    Nicolas Guilloux <nguilloux@richcongress.com>
 * @copyright 2014 - 2020 RichCongress (https://www.richcongress.com)
 *
 * @covers \RichCongress\TestTools\Stubs\Symfony\TranslatorStub
 */
class TranslatorStubTest extends TestCase
{
    /**
     * @var TranslatorStub
     */
    protected $translator;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->translator = new TranslatorStub();
    }

    /**
     * @return void
     */
    public function testAddGetTranslationsAndTranslateWithoutParameter(): void
    {
        $this->translator->addTranslation('key', 'clé');
        self::assertArrayHasKey('key', $this->translator->getTranslations());

        $result = $this->translator->trans('key');
        self::assertSame('clé', $result);
    }

    /**
     * @return void
     */
    public function testAddGetTranslationsAndTranslateWithParameter(): void
    {
        $this->translator->addTranslation('key', 'this needs to be %replaced%');
        self::assertArrayHasKey('key', $this->translator->getTranslations());

        $result = $this->translator->trans('key', ['%replaced%' => 'tested']);
        self::assertSame('this needs to be tested', $result);
    }

    /**
     * @return void
     */
    public function testTranslateMissingKey(): void
    {
        $result = $this->translator->trans('key');
        self::assertSame('key', $result);
    }
}
