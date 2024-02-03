const Telegram = {
    setWebhook: function (e) {
        e.preventDefault();

        BX.ajax.runAction('ramapriya:telegram.controller.Telegram.setWebhook', {})
            .then(response => {
                alert(response.data.message);
            }, reject => {
                let error = reject.errors[0];
                alert(error.message);
            })
    }
}

