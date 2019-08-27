# Running Release Notes for Craft CMS 3.3

## Added
- Added “Headless Mode”, which optimizes the system and Control Panel for headless CMS implementations.
- It’s now possible to create Single sections without URLs. ([#3883](https://github.com/craftcms/cms/issues/3883))
- Added the `hiddenInput()` Twig function, which generates a hidden input tag.
- Added the `input()` Twig function, which generates an input tag.
- Added the `tag()` Twig function, which generates an HTML tag.
- Added the `|attr` Twig filter, which modifies the attributes on an HTML tag. ([#4660](https://github.com/craftcms/cms/issues/4660))
- Added the `|append` and `|prepend` Twig filters, which add new HTML elements as children of an HTML tag. ([#3937](https://github.com/craftcms/cms/issues/3937))
- Added the `headlessMode` config setting.
- Added the `purgeStaleUserSessionDuration` config setting.
- Admin users can now opt into getting the full stack trace view when an uncaught exception occurs when Dev Mode isn’t enabled. ([#4765](https://github.com/craftcms/cms/issues/4765))
- Admin users can now opt into having Twig templates profiled when Dev Mode isn’t enabled.
- Control Panel subnav items can now have badge counts. ([#4756](https://github.com/craftcms/cms/issues/4756))
- Added `craft\helpers\App::webResponseConfig()`.
- Added `craft\helpers\Html::a()`.
- Added `craft\helpers\Html::actionInput()`.
- Added `craft\helpers\Html::appendToTag()`.
- Added `craft\helpers\Html::csrfInput()`.
- Added `craft\helpers\Html::modifyTagAttributes()`.
- Added `craft\helpers\Html::normalizeTagAttributes()`.
- Added `craft\helpers\Html::parseTag()`.
- Added `craft\helpers\Html::parseTagAttributes()`.
- Added `craft\helpers\Html::prependToTag()`.
- Added `craft\helpers\Html::redirectInput()`.
- Added `craft\helpers\StringHelper::afterFirst()`.
- Added `craft\helpers\StringHelper::afterLast()`.
- Added `craft\helpers\StringHelper::append()`.
- Added `craft\helpers\StringHelper::appendRandomString()`.
- Added `craft\helpers\StringHelper::appendUniqueIdentifier()`.
- Added `craft\helpers\StringHelper::at()`.
- Added `craft\helpers\StringHelper::beforeFirst()`.
- Added `craft\helpers\StringHelper::beforeLast()`.
- Added `craft\helpers\StringHelper::capitalizePersonalName()`.
- Added `craft\helpers\StringHelper::count()`.
- Added `craft\helpers\StringHelper::dasherize()`.
- Added `craft\helpers\StringHelper::endsWithAny()`.
- Added `craft\helpers\StringHelper::escape()`.
- Added `craft\helpers\StringHelper::extractText()`.
- Added `craft\helpers\StringHelper::htmlDecode()`.
- Added `craft\helpers\StringHelper::htmlEncode()`.
- Added `craft\helpers\StringHelper::humanize()`.
- Added `craft\helpers\StringHelper::is()`.
- Added `craft\helpers\StringHelper::isBase64()`.
- Added `craft\helpers\StringHelper::isBlank()`.
- Added `craft\helpers\StringHelper::isHexadecimal()`.
- Added `craft\helpers\StringHelper::isHtml()`.
- Added `craft\helpers\StringHelper::isJson()`.
- Added `craft\helpers\StringHelper::isSerialized()`.
- Added `craft\helpers\StringHelper::isUtf8()`.
- Added `craft\helpers\StringHelper::isWhitespace()`.
- Added `craft\helpers\StringHelper::lastSubstringOf()`.
- Added `craft\helpers\StringHelper::lineWrapAfterWord()`.
- Added `craft\helpers\StringHelper::pad()`.
- Added `craft\helpers\StringHelper::padBoth()`.
- Added `craft\helpers\StringHelper::padLeft()`.
- Added `craft\helpers\StringHelper::padRight()`.
- Added `craft\helpers\StringHelper::removeHtml()`.
- Added `craft\helpers\StringHelper::removeHtmlBreak()`.
- Added `craft\helpers\StringHelper::repeat()`.
- Added `craft\helpers\StringHelper::replaceAll()`.
- Added `craft\helpers\StringHelper::replaceBeginning()`.
- Added `craft\helpers\StringHelper::replaceEnding()`.
- Added `craft\helpers\StringHelper::replaceFirst()`.
- Added `craft\helpers\StringHelper::replaceLast()`.
- Added `craft\helpers\StringHelper::safeTruncate()`.
- Added `craft\helpers\StringHelper::shortenAfterWord()`.
- Added `craft\helpers\StringHelper::shuffle()`.
- Added `craft\helpers\StringHelper::slice()`.
- Added `craft\helpers\StringHelper::slugify()`.
- Added `craft\helpers\StringHelper::split()`.
- Added `craft\helpers\StringHelper::startsWithAny()`.
- Added `craft\helpers\StringHelper::stripCssMediaQueries()`.
- Added `craft\helpers\StringHelper::stripEmptyHtmlTags()`.
- Added `craft\helpers\StringHelper::stripHtml()`.
- Added `craft\helpers\StringHelper::stripWhitespace()`.
- Added `craft\helpers\StringHelper::substringOf()`.
- Added `craft\helpers\StringHelper::surround()`.
- Added `craft\helpers\StringHelper::tidy()`.
- Added `craft\helpers\StringHelper::titleizeForHumans()`.
- Added `craft\helpers\StringHelper::toBoolean()`.
- Added `craft\helpers\StringHelper::toSpaces()`.
- Added `craft\helpers\StringHelper::toTabs()`.
- Added `craft\helpers\StringHelper::toTransliterate()`.
- Added `craft\helpers\StringHelper::trimLeft()`.
- Added `craft\helpers\StringHelper::trimRight()`.
- Added `craft\helpers\StringHelper::upperCamelize()`.
- Added `craft\helpers\StringHelper::upperCaseFirst()`.
- Added `craft\helpers\Template::beginProfile()`.
- Added `craft\helpers\Template::endProfile()`.
- Added `craft\services\Sections::getAllEntryTypes()`.
- Added `craft\web\twig\nodes\ProfileNode`.
- Added `craft\web\twig\nodevisitors\Profiler`.

## Changed
- Global set reference tags can now refer to the global set by its handle. ([#4645](https://github.com/craftcms/cms/issues/4645))
- Improved Twig template profiling to include blocks and macros.
- Twig template profiling no longer occurs when Dev Mode isn’t enabled, unless an admin user is logged in and has opted into it.
- The `actionInput()`, `csrfInput()`, and `redirectInput()` Twig functions now support an `options` argument for customizing the HTML tag attributes.
- The `_layouts/forms/field.html` template now supports `label`, `instructions`, `tip`, `warning`, and `input` blocks that can be overridden when including the template with an `{% embed %}` tag.
- Editable tables now support a `fullWidth` setting, which can be set to `false` to prevent the table from spanning the full width of the page.
- Editable tables now support `thin` column settings.
- Editable tables now support `headingHtml` column settings.
- Craft no longer overrides the base Twig template class, unless the now-deprecated `` config setting is enabled. ([#4755](https://github.com/craftcms/cms/issues/4755))
- `craft\helpers\Db::parseParam()` now has an optional `$columnType` argument. ([#4807](https://github.com/craftcms/cms/pull/4807))
- `craft\web\Request::post()` and `getBodyParam()` will now work with posted JSON data, if the request’s content type is set to `application/json`.
- Switched from the `stringy/stringy` library to `voku/stringy`. ([#4753](https://github.com/craftcms/cms/issues/4753))

## Deprecated
- Deprecated the `suppressTemplateErrors` config setting.
- Deprecated `craft\services\Sections::isSectionTemplateValid()`.
- Deprecated `craft\web\twig\Template`.

## Removed
- Removed `craft\web\twig\Extension::actionInputFunction()`.
- Removed `craft\web\twig\Extension::csrfInputFunction()`.
- Removed `craft\web\twig\Extension::redirectInputFunction()`.

## Fixed
- Fixed a SQL error that could occur when `:empty:` or `not :empty:` was passed to a date param on an element query when running MySQL 8. ([#4808](https://github.com/craftcms/cms/issues/4808))