document.addEventListener("DOMContentLoaded", function () {
    const orderPreviewDiv = document.querySelector("#order-preview");
    if (orderPreviewDiv) {
        const fetchButtons = document.querySelectorAll(".fetchPreview");
        const orderDialog = document.querySelector("#orderDialog");
        const dialogContent = document.querySelector("#orderDialogContent");
        const closeDialog = document.querySelector("#closeDialog");

        const openDialog = async (data) => {
            const { first_name, last_name, email_address, widgets_required } =
                data[0];
            const { _order_results } = data[1];

            const resultsArr = JSON.parse(_order_results);
            let resultsTrs = ``;

            for (const [key, val] of Object.entries(resultsArr)) {
                if (val > 0) {
                    resultsTrs += `
					<tr class="order-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 w-full ">
						<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${key}</td>
						<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${val}</td>
					</tr>`;
                }
            }

            const resultsTable = `
			<div class="flex flex-col overflow-auto mt-4">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-collapse">
                    <thead class="text-xs text-gray-700 uppercase bg-slate-100 border rounded">
                        <tr>
                            <th class="px-6 py-3 !border-b-0">Pack Size</th>
                            <th class="px-6 py-3 !border-b-0"># Required</th>
                        </tr>
                    </thead>
                    <tbody>
						${resultsTrs}
                    </tbody>
                </table>
            </div>
			`;

            const newContent = `
			<div class="flex flex-col gap-2 divide-y divide-slate-200">
				<div class="grid grid-cols-2 gap-2">
					<div class="font-medium">Customer Name: </div><div>${first_name} ${last_name}</div>
				</div>
				<div class="grid grid-cols-2 gap-2">
					<div class="font-medium">Email Address: </div><div>${email_address}</div>
				</div>
				<div class="grid grid-cols-2 gap-2">
					<div class="font-medium">Widgets Required: </div><div>${widgets_required.toLocaleString(
                        "en-GB"
                    )}</div>
				</div>
				<div class="grid grid-cols-1 gap-2">
					<div class="font-medium">Results: </div><div>${resultsTable}</div>
				</div>
			</div>
			`;

            dialogContent.innerHTML = newContent;
            // dialogContent.appendChild(newContent);

            orderDialog.showModal();
        };

        closeDialog.addEventListener("click", () => {
            orderDialog.close();
        });

        async function getWidgetOrders(id) {
            const response = await fetch(
                `http://wallys-widgets.test/wp-json/wp/v2/widgets-order/${id}`
            );
            const data = await response.json();
            return data;
        }

        fetchButtons.forEach((button) => {
            button.addEventListener("click", async (e) => {
                let postID = e.target.dataset.id;
                let postData = await getWidgetOrders(postID);

                const response = [postData.acf, postData.meta];
                openDialog(response);
                // console.log("First Name: ", first_name);
                // console.log("Last Name: ", last_name);
                // console.log("Email Address: ", email_address);
                // console.log("Widgets Required: ", widgets_required);
            });
        });
    }
});
