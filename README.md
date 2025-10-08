# PHPUnit 筆記

- [安裝](#安裝)
- [測試指令](#測試指令)
- [命名方式](#命名方式)
- [目錄結構範例](#目錄結構範例)
- [Assertions (斷言)](#assertions-斷言)
- [Command-Line Options (命令列選項)](#command-line-options-命令列選項)
- [phpunit.xml 設定檔詳解](#phpunitxml-設定檔詳解)
- [測試覆蓋率報告](#測試覆蓋率報告)


## 安裝
```bash
composer require --dev phpunit/phpunit
```

## 測試指令
```bash
vendor/bin/phpunit
```

## 命名方式
- 類別名稱必須以 `Test` 結尾 (例如 `MyClassTest`)。
- 測試方法名稱必須以 `test` 開頭 (例如 `testSomethingWorks`)。

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

## Assertions (斷言)
斷言是測試的核心，用來驗證程式的實際行為是否與預期相符。以下是常用斷言的整合列表。

| 分類 (Category) | 斷言 (Assertion) | 說明 |
| :--- | :--- | :--- |
| **Boolean** | `assertTrue()` | 斷言結果為 `true`。 |
| | `assertFalse()` | 斷言結果為 `false`。 |
| **Identity** | `assertSame()` | 斷言兩個變數指向**同一個物件實例**或**完全相等** (`===`)。 |
| **Equality** | `assertEquals()` | 斷言兩個變數的值相等 (`==`)。若用於物件，則斷言它們是**同類別且擁有相同的屬性值**。 |
| | `assertEqualsCanonicalizing()` | 斷言兩個陣列的「值」相等，但**忽略元素順序**。 |
| **Iterable** | `assertArrayHasKey()` | 斷言陣列中存在指定的「鍵 (key)」。 |
| | `assertContains()` | 斷言「值」存在於陣列或可迭代結構中。若用於字串，則是判斷子字串是否存在。 |
| | `assertContainsOnly()` | 斷言陣列中的所有元素，都為指定的類型 (例如 `string`, `int`, `MyClass`)。 |
| **Objects** | `assertObjectHasProperty()` | 斷言物件或類別擁有指定的屬性。 |
| **Cardinality** | `assertCount()` | 斷言陣列或可計數物件的元素數量，是否與預期一致。 |
| | `assertSameSize()` | 斷言兩個可計數物件的元素數量相同。 |
| | `assertEmpty()` | 斷言變數為空 (`empty()` 的判斷標準)。 |
| **Types** | `assertInstanceOf()` | 斷言物件為特定類別或其子類別的實例。 |
| | `assertIsArray()` | 斷言變數為陣列。 |
| | `assertIsList()` | 斷言陣列為 list (意即：從 0 開始的連續整數鍵)。 |
| | `assertIsBool()` | 斷言變數為布林值。 |
| | `assertIsCallable()` | 斷言變數為「可呼叫 (callable)」。 |
| | `assertIsFloat()` | 斷言變數為浮點數。 |
| | `assertIsInt()` | 斷言變數為整數。 |
| | `assertIsIterable()` | 斷言變數為「可迭代 (iterable)」。 |
| | `assertIsNumeric()` | 斷言變數為數字型態。 |
| | `assertIsObject()` | 斷言變數為物件。 |
| | `assertIsResource()` | 斷言變數為 resource (資源) 類型，例如檔案指標。 |
| | `assertIsString()` | 斷言變數為字串。 |
| | `assertNull()` | 斷言變數為 `null`。 |
| **Strings** | `assertStringStartsWith()` | 斷言字串以指定的子字串開頭。 |
| | `assertStringEndsWith()` | 斷言字串以指定的子字串結尾。 |
| | `assertStringContainsString()` | 斷言字串包含指定的子字串。 |
| | `assertMatchesRegularExpression()` | 斷言字串符合指定的正規表示式。 |
| **JSON** | `assertJson()` | 斷言字串為合法的 JSON 格式。 |
| | `assertJsonStringEqualsJsonString()` | 比較兩個 JSON 字串是否代表相同的資料結構，忽略格式差異。 |
| **Filesystem**| `assertDirectoryExists()` | 斷言指定的路徑存在且為一個目錄。 |
| | `assertFileExists()` | 斷言指定的檔案是否存在。 |
| | `assertIsReadable()` | 斷言指定的檔案或目錄「可讀取」。 |
| | `assertIsWritable()` | 斷言指定的檔案或目錄「可寫入」。 |

## Command-Line Options (命令列選項)

| 選項 (Option) | 說明 |
| :--- | :--- |
| `--verbose` | 顯示更詳細的測試執行資訊，包含每個測試的執行時間。 |
| `--debug` | 顯示非常詳細的除錯資訊，包含測試的執行流程。 |
| `--testsuite` | 只執行 `phpunit.xml` 中指定的某個測試套件。例如：`--testsuite=Unit` |
| `--group` | 只執行被 `@group` 標籤標記的測試。 |
| `--filter` | 只執行名稱符合篩選條件的測試 (例如類別名稱或方法名稱)。 |
| `--coverage-text` | 在終端機以純文字方式輸出程式碼覆蓋率報告。 |
| `--coverage-html` | 產生 HTML 格式的覆蓋率報告，並儲存到指定目錄。 |
| `--coverage-filter` | 在產生覆蓋率報告時，只分析指定的目錄，讓報告更聚焦。例如：`--coverage-filter=src` |
| `--display-incomplete` | 在報告末尾，顯示所有被標記為未完成的測試。 |
| `--display-skipped` | 在報告末尾，顯示所有被跳過的測試。 |
| `--display-deprecations` | 顯示執行過程中遇到的 PHP 已廢棄方法警告。 |
| `--display-errors` | 顯示測試執行過程中的 PHP 錯誤詳情。 |

## phpunit.xml 設定檔詳解
`phpunit.xml` 是 PHPUnit 的主要設定檔，用來集中管理測試的行為和選項。

### 主要屬性
以下是 `<phpunit>` 根元素的常用屬性：
- `bootstrap`: 在所有測試執行前，**最先載入**的一個 PHP 檔案。這是一個**必要設定**，幾乎總是設為 `vendor/autoload.php`，用來載入所有 Composer 的依賴套件。
- `colors`: 設定為 `true`，讓終端機的輸出帶有顏色，更具可讀性。
- `verbose`: 設定為 `true`，相當於每次執行都加上 `--verbose` 選項。
- `testdox`: 設定為 `true`，使用簡潔的測試文件格式 (TestDox) 輸出結果，讓報告像一份規格文件。
- `stopOnDefect`: 設定為 `true`，在遇到第一個「任何類型」的缺陷 (錯誤、失敗、警告、有風險) 時，就立即停止執行。
- `stopOnError`: 在遇到第一個 PHP 錯誤後，停止執行。
- `stopOnFailure`: 在遇到第一個斷言失敗 (`assert` failed) 後，停止執行。

### `<testsuites>` (測試套件)
用來將測試分組管理，方便您執行特定類型的測試 (如單元測試、整合測試)。

#### `<testsuite name="...">`
定義一個獨立的測試群組，可自訂 `name`。
- **`<directory>`**: 指定此群組包含的測試檔案目錄。可以有多個。執行時可透過 `--testsuite <name>` 來指定。 

*範例：*
```xml
<testsuites>
    <testsuite name="Unit">
        <directory>tests/unit</directory>
    </testsuite>
    <testsuite name="Integration">
        <directory>tests/integration</directory>
    </testsuite>
</testsuites>
```

### `<source>` (原始碼)
用來設定程式碼覆蓋率分析的對象，告訴 PHPUnit 你的「原始碼」在哪裡。
- **`<include>`**: 應被納入覆蓋率分析的檔案或目錄。
- **`<exclude>`**: 應從覆蓋率分析中排除的檔案或目錄 (例如第三方函式庫、自動產生的檔案)。

#### `<directory>` (在 source 中)
指定要包含或排除的目錄。
- `prefix`: 基於檔名前綴過濾。
- `suffix`: 基於檔名後綴過濾 (例如 `.php`)。

#### `<file>` (在 source 中)
指定要包含或排除的單一檔案。

*範例：*
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

### `<coverage>` (程式碼覆蓋率)
設定如何產生程式碼覆蓋率報告。
- `pathCoverage`: 設定為 `true`，啟用路徑覆蓋率分析，能分析到函式中更複雜的執行路徑，但會稍微降低執行速度。

#### `<report>`
可包含多種報告格式：
- **`<html>`**: 產生 HTML 視覺化報告，最常用，可看到每行程式碼的覆蓋狀態。`outputDirectory` 屬性指定輸出目錄。
- **`<php>`**: 產出 PHP 陣列格式的報告，用於程式化處理。`outputFile` 屬性指定輸出檔案。
- **`<xml>`**: 輸出 XML 格式的覆蓋率報告，常用於 CI/CD 整合。

*範例：*
```xml
<coverage pathCoverage="true">
    <report>
        <html outputDirectory="coverage/"/>
    </report>
</coverage>
```

### `<logging>` (日誌紀錄)
設定測試過程的日誌輸出，主要用於 CI/CD 整合或產生客製化報告。
- **`<junit>`**: 輸出為 JUnit XML 格式，是 CI/CD 工具 (如 Jenkins, GitLab CI) 的標準格式。
- **`<testdoxHtml>`**: 輸出為美觀的 HTML 格式的人類可讀報告。
- **`<testdoxText>`**: 輸出為純文字格式的人類可讀報告。

*範例：*
```xml
<logging>
    <junit outputFile="junit.xml"/>
    <testdoxHtml outputFile="testdox.html"/>
</logging>
```

### `<php>` (PHP 設定)
在測試執行期間，用來模擬不同的 PHP 環境設定。
- **`<ini name="..." value="..."/>`**: 暫時設定一個 `php.ini` 的值，等同於 `ini_set()`。
- **`<const name="..." value="..."/>`**: 定義一個全域常數，等同於 `define()`。常用於定義測試環境依賴的常數。
- **`<var name="..." value="..."/>`**: 設定一個 `$GLOBALS` 全域變數。
- **`<env name="..." value="..."/>`**: 設定一個 `$_ENV` 環境變數，常用於切換設定 (如 `APP_ENV=testing`)。
- **`<server name="..." value="..."/>`**: 設定一個 `$_SERVER` 變數，在測試 Web 相關功能時很有用。
- **`<get>` / `<post>` / `<cookie>` / `<files>` / `<request>`**: 分別用來模擬設定對應的超全域變數。

*範例：*
```xml
<php>
    <ini name="memory_limit" value="-1"/>
    <env name="APP_ENV" value="testing"/>
    <server name="SERVER_PORT" value="8000"/>
</php>
```

## 測試覆蓋率報告

要產生程式碼覆蓋率報告，您需要安裝並啟用 Xdebug 擴充套件。

1.  **安裝 Xdebug**
    ```bash
    # 以 Ubuntu / Debian 為例
    apt install php8.3-xdebug
    ```

2.  **啟用 Coverage 模式**
    在您的 `php.ini` 或 `xdebug.ini` 設定檔中，確保 `xdebug.mode` 包含 `coverage`。
    ```ini
    xdebug.mode=coverage
    ```

3.  **執行測試並產生報告**
    ```bash
    # 產生 HTML 報告到 coverage/ 目錄
    vendor/bin/phpunit --coverage-html coverage

    # 在終端機直接查看文字報告
    vendor/bin/phpunit --coverage-text
    ```
