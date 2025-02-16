class Footer extends HTMLElement {
  connectedCallback() {
    let data = new Date();
    let ano = data.getFullYear();
    this.innerHTML = `
    <footer class="w-full h-20 bg-white">
        <div class="container p-4 mx-auto h-full lg:w-5xl flex items-center text-gray-900 text-sm">
            <p class="text-xs ">&copy; Todos os direitos reservados à <a href="#" class="font-bold border-b">AWP Entertainment</a>. <span class="text-blue-500"> 2022 - ${ano}</span></p>
        </div>
    </footer>
        `;
  }
}

customElements.define("new-footer", Footer);
