**Cordis PHP Client** is PHP API client that allows you to interact with the [Cordis](https://cordis.europa.eu/) API.

## Important
This package is currently in an experimental phase; its architecture is subject to change.

## Table of Contents
- [Get Started](#get-started)
- [Usage](#usage)
  - [Article](#article)
  - [Programme](#programme)
  - [Project](#project)
  - [Result](#result)
  - [Data Extraction](#data-extraction)

## Get Started
First, install via the [Composer](https://getcomposer.org/) package manager:

```bash
composer require msnassar/cordis-php-client
```
Then, interact with Cordis API. There are multiple ways. However, the simplest is to use Cordis class as follows:

```php
$cordis = Cordis::api(['api_key' => getenv('YOUR_API_KEY')]);
```
<small>Note: Passing API_KEY is not mandatory for endpoints that don't require it.</small>

If necessary, it is possible to configure and create a separate client:
```php
use Cordis\Client;
$client = new Client(['api_key' => getenv('YOUR_API_KEY')]);
$client->setHttpClient(new GuzzleClient());
```

## Usage
The following examples are using Cordis class. However, in necessary, you can directly call cordis services.

### Article
#### Get one article
```php
$article = $cordis->articles->get(ID)
```

### Programme
#### Get one programme
```php
$programme = $cordis->programmes->get(ID)
```

### Project
#### Get one project
```php
$project = $cordis->projects->get(ID)
```

### Result
#### Get one result
```php
$result = $cordis->results->get(ID)
```

### Data Extraction
#### Create data extraction
```php
$extraction = $cordis->dataExtraction->create(QUERY)
```
<small>QUERY is cordis query. See [here](https://cordis.europa.eu/about/search) some examples.</small>

#### Get data extraction
```php
$extraction = $cordis->dataExtraction->get(TASK_ID)
```

#### Cancel data extraction
```php
$extraction = $cordis->dataExtraction->cancel(TASK_ID)
```

#### Delete data extraction
```php
$extraction = $cordis->dataExtraction->delete(TASK_ID)
```

#### Get data extraction zip file stream
```php
$file = $cordis->dataExtractionStream->getZipStream(EXTRACTION_FILE_URL)
```
