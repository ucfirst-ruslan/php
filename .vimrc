"return" 2>&- || "exit"
syntax on
colorscheme elflord
set number
set termencoding=utf8
set ruler
set showcmd
set mouse=a
set mousemodel=popup
set ch=1
set mousehide
set autoindent
set expandtab
set shiftwidth=4
set softtabstop=4
set tabstop=4
set laststatus=2
set smartindent
set showmatch
set lines=50
set columns=100
set cursorline
highlight CursorLine guibg=lightblue ctermbg=darkgray
highlight CursorLine term=none cterm=none
set history=200
set list listchars=tab:→\ ,trail:·
filetype plugin on
function! SuperCleverTab()
    if strpart( getline('.'), 0, col('.')-1 ) =~ '^\s*$'
        return "\<Tab>"
    else
        return "\<C-p>"
    endif
endfunction

inoremap <Tab> <C-R>=SuperCleverTab()<cr>

set statusline=
set statusline+=%#PmenuSel#
set statusline+=%{StatuslineGit()}
set statusline+=%#LineNr#
set statusline+=\ %f
set statusline+=%m\
set statusline+=%=
set statusline+=%#CursorColumn#
set statusline+=\ %y
set statusline+=\ %{&fileencoding?&fileencoding:&encoding}
set statusline+=\[%{&fileformat}\]
set statusline+=\ %p%%
set statusline+=\ %l:%c
set statusline+=\ 
function! GitBranch()
  return system("git rev-parse --abbrev-ref HEAD 2>/dev/null | tr -d '\n'")
endfunction

function! StatuslineGit()
  let l:branchname = GitBranch()
  return strlen(l:branchname) > 0?'  '.l:branchname.' ':''
endfunction
