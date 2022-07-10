
const getCategories = async (target) => {
    // console.log(target.dataset.api)
    try {
        const res = await fetch(target.dataset.api, { method: 'GET' })
        json = await res.json()
        console.log('FETCH: ')
        console.table(json)
    }
    catch (err) {
        console.error("error: ", err)
    }

    $.ajax({
        type: "GET",
        url: target.dataset.api,
        data: "data",
        dataType: "JSON",
        success: function (response) {
            
            // $.map(response, function (val, index) {
            //     $(`.test-api-${index}`).html(val[index])
            // });
            console.log(response[0])
            $.map($(`.test-api`), function (node, index) {
                $(node).html(response[0][index] + ' ')
            });
            // $(`.test-api`)
            // console.log('AJAX: ')
            // console.table(response)
        }
    })
}