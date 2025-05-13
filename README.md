## 安裝
```
composer require --dev phpunit/phpunit
```

## 測試指令
```
vendor/bin/phpunit
```

## 命名方式
class *.Test
function test.*

## 基本目錄結構
```
project/
├── src/
│   └── Calculator.php
├── tests/
│   └── CalculatorTest.php
├── phpunit.xml
└── vendor/
```

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
| `processUncoveredFiles`   | 會將未被測試執行的檔案也計入報告中
| `pathCoverage`            | 測試是否覆蓋到所有可能執行路徑（較進階）
| `<include>`               | 包含在專案清單中的檔案
| `<exclude>`               | 排除在專案清單中的檔案
| `<report>`                | 配置要產生的程式碼覆蓋率報告
---
| `<report>`            | desc
| --------------------- | ---------------------------
| `<report>`            | 配置要產生的程式碼覆蓋率報告，父元素 `<coverage>`
| `outputFile`          | 產生的檔案名稱
| `outputDirectory`     | 輸出的名稱
| `<php>`               | 產出 PHP 陣列格式報告
| `<html>`              | 輸出 HTML 視覺化報告
| `<xml>`               | 輸出 XML 格式覆蓋率報告
---

```xml
<coverage includeUncoveredFiles="true"
          pathCoverage="false"
          ignoreDeprecatedCodeUnits="true"
          disableCodeCoverageIgnore="true">
    <report>
        <html outputDirectory="html-coverage"/>
        <php outputFile="coverage.php"/>
        <text outputFile="coverage.txt"/>
        <xml outputDirectory="xml-coverage"/>
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
