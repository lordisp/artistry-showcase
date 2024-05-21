module.exports = {
    proxy: "localhost",
    files: ["style.css", "*.php", "template-parts/**/*.php"],
    injectChanges: true,
    watchOptions: {
        usePolling: true,
    },
};