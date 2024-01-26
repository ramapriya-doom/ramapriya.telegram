function setWebhook(e) {
    e.preventDefault();

    BX.ajax.runAction('api:controllers.Telegram.setWebhook', {})
        .then(response => {
            console.log(response)
        }, reject => {
            console.log(reject)
        })
}

