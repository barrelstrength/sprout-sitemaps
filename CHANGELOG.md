# Changelog

## 2.0.0 - UNRELEASED

## Added
- Added support for using service layer in templates via `sprout.app`

### Changed
- Updated codebase to be managed in `barrelstrength/sprout-base`
- Updated plugin translation category from `sprout-sitemaps` => `sprout`
- Updated Project Config settings from `sprout-sitemaps` => `sprout`
- Updated plugin to use `sprout` migration track
- Updated plugin settings to be managed via Craft settings area
- Updated undocumented template variables to use service layer directly
- Updated `craftcms/cms` requirement v3.5.0
- Updated `barrelstrength/sprout-base` requirement v7.0.0

### Removed
- Removed `barrelstrength/sprout-base-sitemaps` dependency

## 1.3.0 - 2020-04-28

### Changed
- Updated `barrelstrength/sprout-base` requirement v6.0.0

### Fixed
- Fixed migration issue when multiple Sprout plugins are installed

## 1.2.0 - 2020-04-27

### Added
- Added example config file `src/config.php`
- Added `barrelstrength\sproutbase\base\SproutDependencyTrait`
- Added `barrelstrength\sproutbase\base\SproutDependencyInterface`
- Added `barrelstrength\sproutbase\records\Settings`
- Added `barrelstrength\sproutbase\migrations\Install::safeDown()`
- Added support for config overrides in base settings models

### Changed
- Improved uninstall migration
- Updated `barrelstrength/sprout-base` requirement v5.2.0
- Updated `barrelstrength/sprout-base-sitemaps` requirement v1.3.0
- Updated `barrelstrength/sprout-base-uris` requirement v1.1.0

### Removed
- Removed `barrelstrength\sproutbase\services\Settings::getPluginSettings()`
- Removed `barrelstrength\sproutbase\base\BaseSproutTrait`

## 1.1.1 - 2020-03-08

### Changed
- Updated settings label

## 1.1.0 - 2020-02-05

### Added
- Added autofocus to Custom Pages URI input field

### Changed
- Updated `barrelstrength/sprout-base-sitemaps` to v1.2.1

### Changed
- Updates models to use `defineRules()` method
- Refactored in template javascript into assets files
- Updated `barrelstrength/sprout-base-sitemaps` to v1.2.0
- Updated `barrelstrength/sprout-base` to v5.1.0

## 1.0.4 - 2020-01-18

### Changed
- Updated `barrelstrength/sprout-base-sitemaps requirement` v1.1.3

### Fixed
- Fixed minutes value in XML Sitemap output

## 1.0.3 - 2019-12-18

### Changed
- Ensure Sitemap sections default to false when initially created
- Improved error messages when XML Sitemaps are not enabled
- Reorganized assets and build script to support ES6
- Updated `barrelstrength/sprout-base-sitemaps` requirement v1.1.2

### Fixed
- Fixed bug when updating a Sitemap
- Fixed broken link on plugin settings page ([#11])

[#11]: https://github.com/barrelstrength/craft-sprout-sitemaps/issues/11

## 1.0.2 - 2019-09-23

### Changed
- Updated `barrelstrength/sprout-base-sitemaps` requirement v1.1.1

### Fixed
- Fixed error for multilingual setups when no groups are activated ([#1pullrequest])

[#1pullrequest]: https://github.com/barrelstrength/craft-sprout-base-sitemaps/pull/1/files

## 1.0.1 - 2019-08-16

### Changed
- Updated `barrelstrength/sprout-base` requirement v5.0.7
- Updated `barrelstrength/sprout-base-sitemaps` requirement v1.1.0

## 1.0.0 - 2019-04-24

### Added 
- Initial release

