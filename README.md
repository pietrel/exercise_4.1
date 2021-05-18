## Installation

Use the package manager [composer](https://getcomposer.org/installer) to install dependencies.

```bash
composer install
```

Create .env file from .env.example

```bash
cp .env.example .env
```

Set up sails

```bash
alias sail='bash vendor/bin/sail'
sail up -d
```
Prepare database

```bash
sail artisan migrate
sail artisan db:seed
```

Prepare 

```bash
npm install && npm run dev
```

## Usage

Check [local website](http://localhost)


