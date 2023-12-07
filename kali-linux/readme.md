## Kali linux

- [El Pingüino - Kali Linux](https://www.youtube.com/watch?v=5gUdLWph2s4)
- [Repo original](https://github.com/Maalfer/Dockerfile_Hacking/blob/main/Dockerfile)

### comandos nmap
```sh
# obtenemos la ip de la red: 192.17.0.34
ifconfig
# escaneamos todos los hosts en la red y que so tienen
nmap -O 192.17.0.0/24
# obtener puertos abiertos y servicios en la maquina
nmap -p- -sVC -sC --open -sS -vvv -n -Pn 192.17.0.23
```

### errores
- [https://hub.docker.com/r/kalilinux/kali-rolling](https://hub.docker.com/r/kalilinux/kali-rolling)
- apt -y install kali-linux-large da error: `Errors were encountered while processing: 1597.9  console-setup`
```
└─# msfconsole
<internal:dir>:98:in `open': Too many levels of symbolic links @ dir_initialize - /usr/lib/llvm-15/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Release/build/Debug+Asserts/build/Release/build/Debug+Asserts/build/Debug+Asserts/build/Release/build/Debug+Asserts/build/Release/build/Debug+Asserts/build/Release/build/Debug+Asserts/build/Release/build/Release/build/Debug+Asserts/build/Release/build/Debug+Asserts/build/utils/lit/lit/__pycache__ (Errno::ELOOP)
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/path_scanner.rb:50:in `foreach'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/path_scanner.rb:50:in `walk'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/path_scanner.rb:60:in `block in walk'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/path_scanner.rb:50:in `foreach'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/path_scanner.rb:50:in `walk'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/path_scanner.rb:60:in `block in walk'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/path_scanner.rb:50:in `foreach'

	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/cache.rb:165:in `reverse_each'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/cache.rb:165:in `block in unshift_paths_locked'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/store.rb:53:in `block in transaction'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/store.rb:52:in `synchronize'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/store.rb:52:in `transaction'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/cache.rb:164:in `unshift_paths_locked'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/cache.rb:113:in `block in unshift_paths'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/cache.rb:113:in `synchronize'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/cache.rb:113:in `unshift_paths'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/change_observer.rb:22:in `unshift'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/railties-7.0.8/lib/rails/application.rb:342:in `add_lib_to_load_path!'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/railties-7.0.8/lib/rails/application.rb:73:in `inherited'
	from /usr/share/metasploit-framework/config/application.rb:37:in `<module:Framework>'
	from /usr/share/metasploit-framework/config/application.rb:36:in `<module:Metasploit>'
	from /usr/share/metasploit-framework/config/application.rb:35:in `<top (required)>'
	from <internal:/usr/lib/ruby/vendor_ruby/rubygems/core_ext/kernel_require.rb>:38:in `require'
	from <internal:/usr/lib/ruby/vendor_ruby/rubygems/core_ext/kernel_require.rb>:38:in `require'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/core_ext/kernel_require.rb:32:in `require'
	from /usr/share/metasploit-framework/config/environment.rb:2:in `<top (required)>'
	from <internal:/usr/lib/ruby/vendor_ruby/rubygems/core_ext/kernel_require.rb>:38:in `require'
	from <internal:/usr/lib/ruby/vendor_ruby/rubygems/core_ext/kernel_require.rb>:38:in `require'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/core_ext/kernel_require.rb:32:in `require'
	from /usr/share/metasploit-framework/lib/msfenv.rb:28:in `<top (required)>'
	from <internal:/usr/lib/ruby/vendor_ruby/rubygems/core_ext/kernel_require.rb>:38:in `require'
	from <internal:/usr/lib/ruby/vendor_ruby/rubygems/core_ext/kernel_require.rb>:38:in `require'
	from /usr/share/metasploit-framework/vendor/bundle/ruby/3.1.0/gems/bootsnap-1.17.0/lib/bootsnap/load_path_cache/core_ext/kernel_require.rb:32:in `require'
	from /usr/bin/msfconsole:21:in `<main>'

```

