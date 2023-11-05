"muestra los textos resaltados por colores según la extensión
syntax on
" me muestre siempre el num de linea
set number

"## TABULACION
" cuantos espacios vale un caracter \t
set tabstop=2
" cuantos espacios representa un keypress del tabulador
set softtabstop=2
" numero de espacios en cada indentación
set shiftwidth=2

" CONF. BUSCAR
" activa el resaltado de las ocurrencias por defecto fondo amarillo y color blanco (highlighting search)
set hlsearch
" al encontrar las ocurrencias que las resalte con fondo verde y texto negro
hi Search ctermbg=green
hi Search ctermfg=black