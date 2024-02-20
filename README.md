# Интеграция Телеграм-бота и Bitrix framework

Модуль позволяет интегрировать сайты и порталы на 1С-Битрикс с телеграм-ботами

## Установка

### Установка через composer

Перед тем, как скачать файлы модуля, добавьте в composer.json следующий код:

```json
{
  "extra": {
    "installer-paths": {
      "path/to/modules/{$name}/": [
        "type:bitrix-module",
        "type:bitrix-d7-module"
      ]
    }
  }
}
```

где `path/to/modules` - путь к модулям в папке `local` относительно composer.json

```
composer require ramapriya-doom/ramapriya.telegram
```

### Клонирование репозитория

Зайдите в папку с модулями и выполните команду
```
git clone https://github.com/ramapriya-doom/ramapriya.telegram.git
```

После в админке установите модуль в разделе `Marketplace -> Установленные решения`

