<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf712046a5e220f56d496862fd5ec2a77
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WebPConvert\\' => 12,
        ),
        'I' => 
        array (
            'ImageMimeTypeGuesser\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WebPConvert\\' => 
        array (
            0 => __DIR__ . '/..' . '/rosell-dk/webp-convert/src',
        ),
        'ImageMimeTypeGuesser\\' => 
        array (
            0 => __DIR__ . '/..' . '/rosell-dk/image-mime-type-guesser/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'ImageMimeTypeGuesser\\Detectors\\AbstractDetector' => __DIR__ . '/..' . '/rosell-dk/image-mime-type-guesser/src/Detectors/AbstractDetector.php',
        'ImageMimeTypeGuesser\\Detectors\\ExifImageType' => __DIR__ . '/..' . '/rosell-dk/image-mime-type-guesser/src/Detectors/ExifImageType.php',
        'ImageMimeTypeGuesser\\Detectors\\FInfo' => __DIR__ . '/..' . '/rosell-dk/image-mime-type-guesser/src/Detectors/FInfo.php',
        'ImageMimeTypeGuesser\\Detectors\\GetImageSize' => __DIR__ . '/..' . '/rosell-dk/image-mime-type-guesser/src/Detectors/GetImageSize.php',
        'ImageMimeTypeGuesser\\Detectors\\MimeContentType' => __DIR__ . '/..' . '/rosell-dk/image-mime-type-guesser/src/Detectors/MimeContentType.php',
        'ImageMimeTypeGuesser\\Detectors\\SniffFirstFourBytes' => __DIR__ . '/..' . '/rosell-dk/image-mime-type-guesser/src/Detectors/SniffFirstFourBytes.php',
        'ImageMimeTypeGuesser\\Detectors\\Stack' => __DIR__ . '/..' . '/rosell-dk/image-mime-type-guesser/src/Detectors/Stack.php',
        'ImageMimeTypeGuesser\\GuessFromExtension' => __DIR__ . '/..' . '/rosell-dk/image-mime-type-guesser/src/GuessFromExtension.php',
        'ImageMimeTypeGuesser\\ImageMimeTypeGuesser' => __DIR__ . '/..' . '/rosell-dk/image-mime-type-guesser/src/ImageMimeTypeGuesser.php',
        'WebPConvert\\Convert\\ConverterFactory' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/ConverterFactory.php',
        'WebPConvert\\Convert\\Converters\\AbstractConverter' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/AbstractConverter.php',
        'WebPConvert\\Convert\\Converters\\BaseTraits\\AutoQualityTrait' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/BaseTraits/AutoQualityTrait.php',
        'WebPConvert\\Convert\\Converters\\BaseTraits\\DestinationPreparationTrait' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/BaseTraits/DestinationPreparationTrait.php',
        'WebPConvert\\Convert\\Converters\\BaseTraits\\LoggerTrait' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/BaseTraits/LoggerTrait.php',
        'WebPConvert\\Convert\\Converters\\BaseTraits\\OptionsTrait' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/BaseTraits/OptionsTrait.php',
        'WebPConvert\\Convert\\Converters\\BaseTraits\\WarningLoggerTrait' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/BaseTraits/WarningLoggerTrait.php',
        'WebPConvert\\Convert\\Converters\\ConverterTraits\\CloudConverterTrait' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/ConverterTraits/CloudConverterTrait.php',
        'WebPConvert\\Convert\\Converters\\ConverterTraits\\CurlTrait' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/ConverterTraits/CurlTrait.php',
        'WebPConvert\\Convert\\Converters\\ConverterTraits\\EncodingAutoTrait' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/ConverterTraits/EncodingAutoTrait.php',
        'WebPConvert\\Convert\\Converters\\ConverterTraits\\ExecTrait' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/ConverterTraits/ExecTrait.php',
        'WebPConvert\\Convert\\Converters\\Cwebp' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/Cwebp.php',
        'WebPConvert\\Convert\\Converters\\Ewww' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/Ewww.php',
        'WebPConvert\\Convert\\Converters\\FFMpeg' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/FFMpeg.php',
        'WebPConvert\\Convert\\Converters\\Gd' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/Gd.php',
        'WebPConvert\\Convert\\Converters\\Gmagick' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/Gmagick.php',
        'WebPConvert\\Convert\\Converters\\GmagickBinary' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/GmagickBinary.php',
        'WebPConvert\\Convert\\Converters\\GraphicsMagick' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/GraphicsMagick.php',
        'WebPConvert\\Convert\\Converters\\ImageMagick' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/ImageMagick.php',
        'WebPConvert\\Convert\\Converters\\Imagick' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/Imagick.php',
        'WebPConvert\\Convert\\Converters\\ImagickBinary' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/ImagickBinary.php',
        'WebPConvert\\Convert\\Converters\\Stack' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/Stack.php',
        'WebPConvert\\Convert\\Converters\\Vips' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/Vips.php',
        'WebPConvert\\Convert\\Converters\\Wpc' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Converters/Wpc.php',
        'WebPConvert\\Convert\\Exceptions\\ConversionFailedException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Exceptions/ConversionFailedException.php',
        'WebPConvert\\Convert\\Exceptions\\ConversionFailed\\ConversionSkippedException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Exceptions/ConversionFailed/ConversionSkippedException.php',
        'WebPConvert\\Convert\\Exceptions\\ConversionFailed\\ConverterNotOperationalException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Exceptions/ConversionFailed/ConverterNotOperationalException.php',
        'WebPConvert\\Convert\\Exceptions\\ConversionFailed\\ConverterNotOperational\\InvalidApiKeyException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Exceptions/ConversionFailed/ConverterNotOperational/InvalidApiKeyException.php',
        'WebPConvert\\Convert\\Exceptions\\ConversionFailed\\ConverterNotOperational\\SystemRequirementsNotMetException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Exceptions/ConversionFailed/ConverterNotOperational/SystemRequirementsNotMetException.php',
        'WebPConvert\\Convert\\Exceptions\\ConversionFailed\\FileSystemProblemsException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Exceptions/ConversionFailed/FileSystemProblemsException.php',
        'WebPConvert\\Convert\\Exceptions\\ConversionFailed\\FileSystemProblems\\CreateDestinationFileException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Exceptions/ConversionFailed/FileSystemProblems/CreateDestinationFileException.php',
        'WebPConvert\\Convert\\Exceptions\\ConversionFailed\\FileSystemProblems\\CreateDestinationFolderException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Exceptions/ConversionFailed/FileSystemProblems/CreateDestinationFolderException.php',
        'WebPConvert\\Convert\\Exceptions\\ConversionFailed\\InvalidInputException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Exceptions/ConversionFailed/InvalidInputException.php',
        'WebPConvert\\Convert\\Exceptions\\ConversionFailed\\InvalidInput\\ConverterNotFoundException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Exceptions/ConversionFailed/InvalidInput/ConverterNotFoundException.php',
        'WebPConvert\\Convert\\Exceptions\\ConversionFailed\\InvalidInput\\InvalidImageTypeException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Exceptions/ConversionFailed/InvalidInput/InvalidImageTypeException.php',
        'WebPConvert\\Convert\\Exceptions\\ConversionFailed\\InvalidInput\\TargetNotFoundException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Exceptions/ConversionFailed/InvalidInput/TargetNotFoundException.php',
        'WebPConvert\\Convert\\Helpers\\JpegQualityDetector' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Helpers/JpegQualityDetector.php',
        'WebPConvert\\Convert\\Helpers\\PhpIniSizes' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Convert/Helpers/PhpIniSizes.php',
        'WebPConvert\\Exceptions\\InvalidInputException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Exceptions/InvalidInputException.php',
        'WebPConvert\\Exceptions\\InvalidInput\\InvalidImageTypeException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Exceptions/InvalidInput/InvalidImageTypeException.php',
        'WebPConvert\\Exceptions\\InvalidInput\\TargetNotFoundException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Exceptions/InvalidInput/TargetNotFoundException.php',
        'WebPConvert\\Exceptions\\WebPConvertException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Exceptions/WebPConvertException.php',
        'WebPConvert\\Helpers\\BinaryDiscovery' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Helpers/BinaryDiscovery.php',
        'WebPConvert\\Helpers\\FileExists' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Helpers/FileExists.php',
        'WebPConvert\\Helpers\\InputValidator' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Helpers/InputValidator.php',
        'WebPConvert\\Helpers\\MimeType' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Helpers/MimeType.php',
        'WebPConvert\\Helpers\\PathChecker' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Helpers/PathChecker.php',
        'WebPConvert\\Helpers\\Sanitize' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Helpers/Sanitize.php',
        'WebPConvert\\Loggers\\BaseLogger' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Loggers/BaseLogger.php',
        'WebPConvert\\Loggers\\BufferLogger' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Loggers/BufferLogger.php',
        'WebPConvert\\Loggers\\EchoLogger' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Loggers/EchoLogger.php',
        'WebPConvert\\Options\\ArrayOption' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Options/ArrayOption.php',
        'WebPConvert\\Options\\BooleanOption' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Options/BooleanOption.php',
        'WebPConvert\\Options\\Exceptions\\InvalidOptionTypeException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Options/Exceptions/InvalidOptionTypeException.php',
        'WebPConvert\\Options\\Exceptions\\InvalidOptionValueException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Options/Exceptions/InvalidOptionValueException.php',
        'WebPConvert\\Options\\Exceptions\\OptionNotFoundException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Options/Exceptions/OptionNotFoundException.php',
        'WebPConvert\\Options\\GhostOption' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Options/GhostOption.php',
        'WebPConvert\\Options\\IntegerOption' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Options/IntegerOption.php',
        'WebPConvert\\Options\\IntegerOrNullOption' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Options/IntegerOrNullOption.php',
        'WebPConvert\\Options\\MetadataOption' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Options/MetadataOption.php',
        'WebPConvert\\Options\\Option' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Options/Option.php',
        'WebPConvert\\Options\\Options' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Options/Options.php',
        'WebPConvert\\Options\\QualityOption' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Options/QualityOption.php',
        'WebPConvert\\Options\\SensitiveArrayOption' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Options/SensitiveArrayOption.php',
        'WebPConvert\\Options\\SensitiveStringOption' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Options/SensitiveStringOption.php',
        'WebPConvert\\Options\\StringOption' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Options/StringOption.php',
        'WebPConvert\\Serve\\Exceptions\\ServeFailedException' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Serve/Exceptions/ServeFailedException.php',
        'WebPConvert\\Serve\\Header' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Serve/Header.php',
        'WebPConvert\\Serve\\Report' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Serve/Report.php',
        'WebPConvert\\Serve\\ServeConvertedWebP' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Serve/ServeConvertedWebP.php',
        'WebPConvert\\Serve\\ServeConvertedWebPWithErrorHandling' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Serve/ServeConvertedWebPWithErrorHandling.php',
        'WebPConvert\\Serve\\ServeFile' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/Serve/ServeFile.php',
        'WebPConvert\\WebPConvert' => __DIR__ . '/..' . '/rosell-dk/webp-convert/src/WebPConvert.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf712046a5e220f56d496862fd5ec2a77::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf712046a5e220f56d496862fd5ec2a77::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf712046a5e220f56d496862fd5ec2a77::$classMap;

        }, null, ClassLoader::class);
    }
}
