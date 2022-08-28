
const getCategories = async (target) => {
    try {
        const res = await fetch(target.dataset.api, { method: 'GET' })
        let json = await res.json()
        console.log('FETCH: ')
        console.table(json)
    }
    catch (err) {
        console.error("error: ", err)
    }
}

const getSearchedRecords = async (target) => {
    try {
        let req = JSON.stringify({ where: target.value })
        const res = await fetch(target.dataset.api, {
            method: 'POST',
            headers: {
                "Content-type": "html",
                // "Content-type": "application/json",
                "X-CSRF-Token": target.dataset.token
            },
            body: req
        })
        let data = await res.text()
        console.log(data)
        // document.querySelector("#data-table-tbody").appendChild(data)
    }
    catch (err) {
        console.error("error: ", err.message)
    }
}

// $.ajax({
//     type: "GET",
//     url: target.dataset.api,
//     data: "data",
//     dataType: "JSON",
//     success: function (response) {
        
//         // $.map(response, function (val, index) {
//         //     $(`.test-api-${index}`).html(val[index])
//         // });
//         console.log(response[0])
//         $.map($(`.test-api`), function (node, index) {
//             $(node).html(response[0]['category_description'] + ' ')
//         });
//         // $(`.test-api`)
//         // console.log('AJAX: ')
//         // console.table(response)
//     }
// })

// const getSearchedRecords = async (target) => {
//     try {
//         let req = JSON.stringify({ where: target.value })
//         const res = await fetch(target.dataset.api, {
//             method: 'POST',
//             headers: {
//                 "Content-type":"application/json",
//                 "X-CSRF-Token": target.dataset.token
//             },
//             body: req
//         })
//         let json = await res.json()
//         console.log('Searched records: ')
//         console.table(json.length ? json : `-- No matching records --`)
//     }
//     catch (err) {
//         console.error("error: ", err.message)
//     }
// }
