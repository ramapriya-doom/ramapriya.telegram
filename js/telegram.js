const Telegram = {
    deleteItem: function (tableName, itemId) {

        BX.ajax.runAction('ramapriya:telegram.controller.GridAdminAction.deleteItem', {
            data: {
                tableName,
                itemId
            }
        })
            .then(response => {
                console.log(response);
            }, reject => {
                console.log(reject);
            })
    }
}

