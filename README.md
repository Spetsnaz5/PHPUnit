- [安裝](#安裝)
- [測試指令](#測試指令)
- [命名方式](#命名方式) 
- [目錄結構範例](#目錄結構範例)
- [Assertions](#assertions)
- [Command-Line Options](#command-line-options)
- [phpunit.xml](#phpunitxml)
- [測試覆蓋報告](#測試覆蓋報告)


## 安裝
```
composer require --dev phpunit/phpunit "^12.1"
```

## 測試指令
```
vendor/bin/phpunit
```

## 命名方式
```
class *Test
function test*
```

## 目錄結構範例
```
project/
├── src/
│   └── Calculator.php
├── tests/
│   └── CalculatorTest.php
├── phpunit.xml
└── vendor/
```

## Assertions
| Boolean  |   說明
| ------------- | -------------
| `assertTrue` |    判斷 `true`
| `assertFalse` |   判斷 `false`
---
| Identity  |   說明
| ------------- | -------------
| `assertSame` |    判斷類型與值 `===`
---
| Equality  |   說明
| ------------- | -------------
| `assertEquals` |    判斷值 `==`，比較陣列或資料結構
| `assertEqualsCanonicalizing` |    比較兩個陣列（或集合）內容是否相等，但忽略元素的順序
---
| iterable  |   說明
| ------------- | -------------
| `assertArrayHasKey` |   陣列是否存在指定 key
| `assertContains` |   值是否存在於陣列或可遍歷的資料結構中
| `assertContainsOnly[:type]`    |   驗證類型 [:type] = `Array` `Bool` `Callable` `Float` `Int` `Iterable` `Null` `Numeric` `Object` `String` `InstancesOf`
---
| objects  |   說明
| ------------- | -------------
| `assertObjectHasProperty`    |   物件是否擁有指定的屬性（property）
---
| cardinality  |   說明
| ------------- | -------------
| `assertCount`    |   陣列或可計數對象（例如陣列、Collection、Countable 類別）中的元素數量是否與預期一致
| `assertSameSize`    |   確認兩個（陣列、物件等）具有相同的元素數量
| `assertEmpty`    |   驗證一個變數「是空的」，其判定標準與 empty() 相同 (`''` `[]` `0` `null` `false`)
---
| types  |   說明
| ------------- | -------------
| `assertInstanceOf`    |   物件是否為特定類別或其子類別的實例
| `assertIsArray`    |   變數是否為陣列（array）
| `assertIsList`    |   陣列是「list」格式
| `assertIsBool`    |   變數是否為布林值
| `assertIsCallable`    |   變數是否為「可呼叫(callable)」
| `assertIsFloat`    |   變數是否為浮點數（float
| `assertIsInt`    |   變數是否為整數（int）
| `assertIsIterable`    |   變數是否為「可迭代 (iterable)」
| `assertIsNumeric`    |   變數是否為數字型態（numeric）
| `assertIsObject`    |   變數是否為物件（object）
| `assertIsResource`    |   變數是否為 resource 類型，resource 特殊的資料類型，通常代表外部資源的連接或參考 (檔案指標 fopen()、資料庫連線、影像資源、其他系統資源)
| `assertIsString`    |   變數是否為字串（string）型態
| `assertNull`    |   變數是否為 null
---
| strings  |   說明
| ------------- | -------------
| `assertStringStartsWith`    |   字串是否以指定的字串作為開頭
| `assertStringEndsWith`    |   字串是否以指定的字串作為結尾
| `assertStringContainsString`    |   字串是否包含另一個指定字串
| `assertMatchesRegularExpression`    |   字串是否符合指定的正則表達式
---
| json  |   說明
| ------------- | ------------- 
| `assertJson`    |   字串是否為合法的 JSON 格式 
| `assertJsonStringEqualsJsonString`    |   比較兩個 JSON 字串是否代表相同的資料結構
---
| filesystem  |   說明
| ------------- | ------------- 
| `assertDirectoryExists`    |   指定路徑是否存在且為目錄
| `assertFileExists`    |   指定的檔案是否存在
| `assertIsReadable`    |   指定的檔案或目錄是否具有「可讀取」權限 
| `assertIsWritable`    |   指定的檔案或目錄是否具有「可寫入」權限
---

## Command-Line Options
| Options | desc
| ------------- | ------------------------------------ 
| `--verbose`     | 	顯示更詳細的測試資訊
| `--coverage-text` | 以純文字方式輸出覆蓋率到終端機
| `--coverage-filter=src` | 明確指定要分析覆蓋率的目錄或檔案
| `--testsuite=Unit` | 只執行指定的測試套件
| `--debug`                | 顯示每個測試的詳細執行過程 |
| `--display-incomplete`   | 顯示未完成的測試      |
| `--display-skipped`      | 顯示被跳過的測試      |
| `--display-deprecations` | 顯示已廢棄方法警告     |
| `--display-errors`       | 顯示錯誤詳情        |
---

## phpunit.xml
| `<phpunit>`   | desc
| ------------- | ------------------------------------ |
| `bootstrap`   | 執行測試前先引入此檔案（通常是 Composer 的 autoload)
| `colors`      | 輸出加上顏色
| `verbose`     | 顯示更多細節
| `testdox`     | 使用簡潔文字格式輸出測試進度
| `stopOnDefect`| 在第一次錯誤、失敗、警告或有風險的測試後停止測試套件執行
| `stopOnError`| 第一個錯誤後停止測試套件執行
| `stopOnFailure`| 第一次失敗後停止測試套件執行
---

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit bootstrap="vendor/autoload.php"
            colors="true"
            verbose="true">
    <testsuites>
        <testsuite name="Unit Tests">
            <directory>tests</directory>
        </testsuite>
        <testsuite name="Unit Tests2">
            <directory>tests2</directory>
        </testsuite>
    </testsuites>
    <php>
        <env name="APP_ENV" value="testing"/>
    </php>
</phpunit>
```
---

| `<testsuites>`           | desc   |
| ------------------------ | ---------------------------    |
| `<testsuites>`           | 測試群組總容器，可包含多個 `<testsuite>`，父元素 `<phpunit>`
| `<testsuite name="...">` | 單一測試群組，名稱自訂
| `<directory>`            | 指定要包含測試的目錄，可有多個 vendor/bin/phpunit --testsuite "Unit Tests" |
---

```xml
<testsuites>
    <testsuite name="unit">
        <directory>tests/unit</directory>
    </testsuite>
    <testsuite name="integration">
        <directory>tests/integration</directory>
    </testsuite>
    <testsuite name="edge-to-edge">
        <directory>tests/edge-to-edge</directory>
    </testsuite>
</testsuites>
```
---

| `<source>`        | desc
| ----------------- | ---------------------------
| `<source>`        | 配置專案中，父元素 `<phpunit>`
| `<include>`       | 包含在專案清單中的檔案
| `<exclude>`       | 排除在專案清單中的檔案
---
| `<directory>`     | desc
| ----------------- | ---------------------------
| `<directory>`     | 配置目錄及其子目錄，父元素 `<include>`、`<exclude>`
| `prefix`          | 基於前綴的過濾器，套用於目錄及其子目錄中的檔案名稱
| `suffix`          | 基於後綴的過濾器，套用於目錄及其子目錄中的檔案的名稱
---
| `<file>`          | desc
| ----------------- | ---------------------------
| `<file>`          | 配置一個文件，將其包含在專案清單中或從中排除，父元素 `<include>`、`<exclude>`
---

```xml
<source>
    <include>
        <directory suffix=".php">src</directory>
    </include>
    <exclude>
        <directory suffix=".php">src/generated</directory>
        <file>src/autoload.php</file>
    </exclude>
</source>
```
---

| `<coverage>`              | desc   |
| -----------------------   | ---------------------------    |
| `<coverage>`              | 分析你執行的測試「覆蓋了原始程式碼的哪些部分」，父元素 `<phpunit>`
| `pathCoverage`            | 測試是否覆蓋到所有可能執行路徑（較進階）
| `<report>`                | 配置要產生的程式碼覆蓋率報告
---
| `<report>`            | desc
| --------------------- | ---------------------------
| `<report>`            | 配置要產生的程式碼覆蓋率報告，父元素 `<coverage>`
| `outputDirectory`     | 輸出的目錄(html)
| `outputFile`          | 輸出的檔案名稱(php)
| `<php>`               | 產出 PHP 陣列格式報告
| `<html>`              | 輸出 HTML 視覺化報告
| `<xml>`               | 輸出 XML 格式覆蓋率報告
---

```xml
<coverage>
    <report>
        <html outputDirectory="coverage/"/>
        <php outputFile="coverage.php"/>
    </report>
</coverage>
```
---

| `<logging>`           | desc   |
| --------------------- | ---------------------------    |
| `<logging>`           | 設定 PHPUnit 測試過程輸出紀錄檔，父元素 `<phpunit>`
| `<junit>`             | 輸出為 JUnit XML 格式，給 Jenkins、GitLab CI 等工具使用
| `<testdoxHtml>`       | 美觀的人類可讀報告
| `<testdoxText>`       | 類似上面，但為純文字版本
---

```xml
<logging>
    <junit outputFile="junit.xml"/>
    <testdoxHtml outputFile="testdox.html"/>
    <testdoxText outputFile="testdox.txt"/>
</logging>
```
---

| `<php>`                   | desc   |
| ------------------------ | ---------------------------    |
| `<php>`           | 設定 PHP 配置，父元素 `<phpunit>`
| `<ini>`           | `<ini name="foo" value="bar"/>` => `ini_set('foo', 'bar')`
| `<const>`         | 設定全域常數 `<const name="foo" value="bar"/>` => `define('foo', 'bar')`
| `<var>`           | 設定全域變數 `<var name="foo" value="bar"/>` => `$GLOBALS['foo'] = 'bar'`
| `<env>`           | 設定環境變數 `<env name="foo" value="bar"/>` => `$_ENV['foo'] = 'bar'`
| `<get>`           | `<get name="foo" value="bar"/>` => `$_GET['foo'] = 'bar'`
| `<post>`          | `<post name="foo" value="bar"/>` => `$_POST['foo'] = 'bar'`
| `<cookie>`        | `<cookie name="foo" value="bar"/>` => `$_COOKIE['foo'] = 'bar'`
| `<server>`        | `<server name="foo" value="bar"/>` => `$_SERVER['foo'] = 'bar'`
| `<files>`         | `<files name="foo" value="bar"/>` => `$_FILES['foo'] = 'bar'`
| `<request>`       | `<request name="foo" value="bar"/>` => `$_REQUEST['foo'] = 'bar'`
---

```xml
<php>
    <ini name="foo" value="bar"/>
    <const name="foo" value="bar"/>
    <var name="foo" value="bar"/>
    <env name="foo" value="bar"/>
</php>
```
---

## 測試覆蓋報告 
```
## 安裝 xdebug
apt install php8.3-xdebug

## 確認 Xdebug 是否已啟用
php -v | grep 'Xdebug'

## 編輯 CLI 的 xdebug 設定檔 加入 xdebug.mode=coverage
vim /etc/php/8.3/cli/conf.d/20-xdebug.ini

## 執行
XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-text --coverage-filter=tests
```