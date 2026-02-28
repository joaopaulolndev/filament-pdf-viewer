# Changelog

All notable changes to `filament-pdf-viewer` will be documented in this file.

## v3.0.1 - 2026-02-28

### What's Changed

#### Bug Fixes

- **fix(infolist):** Handle array state in PdfViewerEntry to prevent 403 Forbidden (#29)

The infolist template passed the raw state to `getRoute()` without handling the case where state is an array, causing `getFileUrl()` to fail and generate invalid URLs resulting in 403 errors.

**Full Changelog**: https://github.com/joaopaulolndev/filament-pdf-viewer/compare/v3.0.0...v3.0.1

## v3.0.0 - 2026-01-20

### What's Changed

* Bump dependabot/fetch-metadata from 2.4.0 to 2.5.0 by @dependabot[bot] in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/32

**Full Changelog**: https://github.com/joaopaulolndev/filament-pdf-viewer/compare/v2.1.0...v3.0.0

## v2.1.0 - 2026-01-03

### What's Changed

* Bump actions/checkout from 4 to 5 by @dependabot[bot] in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/26
* Bump stefanzweifel/git-auto-commit-action from 5 to 6 by @dependabot[bot] in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/25
* Bump stefanzweifel/git-auto-commit-action from 6 to 7 by @dependabot[bot] in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/27
* Bump actions/checkout from 5 to 6 by @dependabot[bot] in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/28
* Refactor PDF viewer components for consistency and efficiency by @jeffersongoncalves in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/31

**Full Changelog**: https://github.com/joaopaulolndev/filament-pdf-viewer/compare/v2.0.0...v2.1.0

## v2.0.0 - 2025-08-09

### What's Changed

* Bump dependabot/fetch-metadata from 2.3.0 to 2.4.0 by @dependabot[bot] in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/21
* 2.x upgrade v4 by @jeffersongoncalves in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/24

**Full Changelog**: https://github.com/joaopaulolndev/filament-pdf-viewer/compare/v1.0.7...v2.0.0

## v1.0.7 - 2025-02-07

### What's Changed

* Bump dependabot/fetch-metadata from 2.2.0 to 2.3.0 by @dependabot in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/15
* Fix #12 : fix wrong return type by @CharlieEtienne in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/18

### New Contributors

* @CharlieEtienne made their first contribution in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/18

**Full Changelog**: https://github.com/joaopaulolndev/filament-pdf-viewer/compare/v1.0.6...v1.0.7

## v1.0.6 - 2024-09-26

### What's Changed

* Update PdfViewerEntry.php by @kmoconnect in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/9

### New Contributors

* @kmoconnect made their first contribution in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/9

**Full Changelog**: https://github.com/joaopaulolndev/filament-pdf-viewer/compare/v1.0.5...v1.0.6

## v1.0.5 - 2024-09-05

**Full Changelog**: https://github.com/joaopaulolndev/filament-pdf-viewer/compare/v1.0.4...v1.0.5

## v1.0.4 - 2024-09-05

**Full Changelog**: https://github.com/joaopaulolndev/filament-pdf-viewer/compare/v1.0.3...v1.0.4

## v1.0.3 - 2024-09-05

### What's Changed

* Improve file url handler by @a21ns1g4ts in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/8

### New Contributors

* @a21ns1g4ts made their first contribution in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/8

**Full Changelog**: https://github.com/joaopaulolndev/filament-pdf-viewer/compare/v1.0.2...v1.0.3

## v1.0.2 - 2024-07-11

### What's Changed

* Bump dependabot/fetch-metadata from 2.1.0 to 2.2.0 by @dependabot in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/6
* Allow closure in setting the file url in infolists entry. by @SalehHub in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/5

### New Contributors

* @SalehHub made their first contribution in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/5

**Full Changelog**: https://github.com/joaopaulolndev/filament-pdf-viewer/compare/v1.0.1...v1.0.2

## v1.0.1 - 2024-07-05

### What's Changed

* Update README.md by @jeffersonsimaogoncalves in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/3
* Allow closure in setting the file url in form field. by @agcodex01 in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/4

### New Contributors

* @jeffersonsimaogoncalves made their first contribution in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/3
* @agcodex01 made their first contribution in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/4

**Full Changelog**: https://github.com/joaopaulolndev/filament-pdf-viewer/compare/v1.0.0...v1.0.1

## v1.0.0 - 2024-06-22

### What's Changed

* Bump dependabot/fetch-metadata from 1.6.0 to 2.1.0 by @dependabot in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/1
* Develop by @rmsramos in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/2

### New Contributors

* @dependabot made their first contribution in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/1
* @rmsramos made their first contribution in https://github.com/joaopaulolndev/filament-pdf-viewer/pull/2

**Full Changelog**: https://github.com/joaopaulolndev/filament-pdf-viewer/commits/v1.0.0

## 1.0.0 - 202X-XX-XX

- initial release
