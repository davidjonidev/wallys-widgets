## Wally's Widgets - Test

-   Used to calculate what size packs need to be sent to customer in order to fulfil the order without sending too many widgets or not enough widgets

## Install/Deploy Instructions

```bash
npm install
```

Quick commands:

# dev server start

```bash
npm run dev
```

# production build

```bash
npm run build
```

Ensure **define("IS_VITE_DEVELOPMENT", true);** is set to false when deploying. ( Can be in config.php or functions.php )

## Deployment bug (Production mode only)

-   Vite build process will sometimes place the main.css/js manifest setup in the wrong order
-   Simply re-order the two and the js/css will load correctly
