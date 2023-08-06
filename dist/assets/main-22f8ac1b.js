document.addEventListener("DOMContentLoaded",function(){console.log("js executed..."),document.querySelectorAll('input[type="text"]').forEach(i=>{i.setAttribute("data-lpignore",!0)});const d=document.querySelector("#menu-icon"),t=document.querySelector("#menu-icon-close"),o=document.querySelector("#burger-menu");d.onclick=()=>{o.classList.toggle("menu-open")},t.onclick=()=>{o.classList.remove("menu-open")}});document.addEventListener("DOMContentLoaded",function(){if(document.querySelector("#order-preview")){const d=document.querySelectorAll(".fetchPreview"),t=document.querySelector("#orderDialog"),o=document.querySelector("#orderDialogContent"),i=document.querySelector("#closeDialog"),g=async e=>{const{first_name:r,last_name:s,email_address:a,widgets_required:n}=e[0],{_order_results:p}=e[1],v=JSON.parse(p);let c="";for(const[w,l]of Object.entries(v))l>0&&(c+=`
					<tr class="order-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 w-full ">
						<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${w}</td>
						<td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${l}</td>
					</tr>`);const y=`
			<div class="flex flex-col overflow-auto mt-4">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-collapse">
                    <thead class="text-xs text-gray-700 uppercase bg-slate-100 border rounded">
                        <tr>
                            <th class="px-6 py-3 !border-b-0">Pack Size</th>
                            <th class="px-6 py-3 !border-b-0"># Required</th>
                        </tr>
                    </thead>
                    <tbody>
						${c}
                    </tbody>
                </table>
            </div>
			`,f=`
			<div class="flex flex-col gap-2 divide-y divide-slate-200">
				<div class="grid grid-cols-2 gap-2">
					<div class="font-medium">Customer Name: </div><div>${r} ${s}</div>
				</div>
				<div class="grid grid-cols-2 gap-2">
					<div class="font-medium">Email Address: </div><div>${a}</div>
				</div>
				<div class="grid grid-cols-2 gap-2">
					<div class="font-medium">Widgets Required: </div><div>${n.toLocaleString("en-GB")}</div>
				</div>
				<div class="grid grid-cols-1 gap-2">
					<div class="font-medium">Results: </div><div>${y}</div>
				</div>
			</div>
			`;o.innerHTML=f,t.showModal()};i.addEventListener("click",()=>{t.close()});async function m(e){return await(await fetch(`http://wallys-widgets.test/wp-json/wp/v2/widgets-order/${e}`)).json()}d.forEach(e=>{e.addEventListener("click",async r=>{let s=r.target.dataset.id,a=await m(s);const n=[a.acf,a.meta];g(n)})})}});document.addEventListener("DOMContentLoaded",function(){anime({targets:".site-logo, .acf-form-submit input[type='submit']",opacity:[0,1],translateX:[-100,0],duration:2e3}),anime({targets:"#page-title",opacity:[0,1],translateY:[-100,0],duration:2e3}),anime({targets:".order-row",opacity:[0,1],translateY:[-100,0],duration:250,delay:anime.stagger(50),easing:"linear"}),anime({targets:".acf-field:nth-of-type(odd), .widget-form-header > *, .order-single-info",opacity:[0,1],translateX:[-100,0],duration:500,delay:anime.stagger(150),easing:"linear"}),anime({targets:".acf-field:nth-of-type(even)",opacity:[0,1],translateX:[100,0],duration:500,delay:anime.stagger(150),easing:"linear"})});
