window.addEventListener('DOMContentLoaded', function () {

    fetchProvinceData();

    var provinceSelectElement = document.getElementById('province');
    var districtSelectElement = document.getElementById('district');
    var wardSelectElement = document.getElementById('ward');

    var districtDetails = null

    function fetchProvinceData() {
        fetch("/api/v1/checkout/get-province", {
            method: 'GET',
        })
        .then(response => response.json())
        .then(result => {
            if (result.status != "OK") {
                alert('Co loi trong qua trinh lay du lieu tinh, thu lai sau')
                return; // Thoat khoi ham
            }

            var provinces = result.data;

            window.provinces = result.data;
     
            var html = '<option selected value="">Chọn tỉnh</option>'

            var provinceNames = Object.keys(provinces);

            for (const name of provinceNames) {
                var code = provinces[name].code;
                var option = `<option value="${code}">${name}</option>`

                html += option
            }

            if (provinceSelectElement) provinceSelectElement.innerHTML = html
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }


    provinceSelectElement.addEventListener('change', (e) =>{
        var code = provinceSelectElement.value;
        fetch(`/api/v1/checkout/get-province-detail?code=${code}`,{
            method: 'GET',

        })

        .then( )
        .then(result => {
            console.log(result)
            window.ad =result.data
            var data = result.data.district
            districtDetails = result.data.district

            var districtNames = [];
            for(const item of data)
                districtNames.push(item.name)

                var html = '<option selected value="">Chọn quận/huyện</option>'

           

                var count = 0
            for (const name of districtNames) {
                var option = `<option value="${count}">${name}</option>`

                html += option
                count++
            }

            if (districtSelectElement) districtSelectElement.innerHTML = html
        }) 
        .catch(error => {
            console.error('Error:', error);
        });
    })

    districtSelectElement.addEventListener('change', (e) =>{
        var ward = districtDetails[districtSelectElement.value].ward
        var wardNames = []

        for(var item of ward)
            wardNames.push(item.name)

            var html = '<option selected value="">Chọn phường/xã</option>'

            var count = 0
            for(var name of wardNames){
                var option = `<option value="${count}">${name}</option>`

                html += option
                count++
            }

            if (wardSelectElement) wardSelectElement.innerHTML = html

    })
})