const districtId = document.getElementById("district_id");

const removeAllChild = (parent) => {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
};

const getData = async function (ele, subEle) {
    try {
        const res = await fetch(
            `http://127.0.0.1:8000/get/subdistrict/${ele.value}`
        );
        const dataArr = await res.json();
        const sub = document.getElementById(`${subEle}`);
        removeAllChild(sub);
        dataArr.forEach((data, _) => {
            if (data) {
                sub.insertAdjacentHTML(
                    "beforeend",
                    `<option value=${data.id} selected >${data.subdistrict_en}
                    </option>`
                );
                return;
            }
            sub.insertAdjacentHTML("beforeend", "<option></option>");
            sub.removeChild(sub.firstElementChild);
        });
    } catch (error) {
        console.log("error");
    }
};

districtId.addEventListener(
    "change",
    async () => await getData(districtId, "subdistrict_id")
);
