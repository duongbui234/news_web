const categoryId = document.getElementById("category_id");
const districtId = document.getElementById("district_id");

const removeAllChild = (parent) => {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
};

const getData = async function (ele, subEle) {
    try {
        const res = await fetch(
            `http://127.0.0.1:8000/get/${
                ele === categoryId ? "subcategory" : "subdistrict"
            }/${ele.value}`
        );
        const dataArr = await res.json();
        const sub = document.getElementById(`${subEle}`);
        removeAllChild(sub);
        dataArr.forEach((data, _) => {
            if (data) {
                sub.insertAdjacentHTML(
                    "beforeend",
                    `<option value=${data.id} selected >${
                        ele === categoryId
                            ? data.subcategory_en
                            : data.subdistrict_en
                    }</option>`
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

categoryId.addEventListener(
    "change",
    async () => await getData(categoryId, "subcategory_id")
);
districtId.addEventListener(
    "change",
    async () => await getData(districtId, "subdistrict_id")
);
