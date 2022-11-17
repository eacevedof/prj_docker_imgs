### php, xdebug and vscode

```json
//launch.json ok
"configurations": [
  {
    "name": "PHP xdebug VSCode",
    "type": "php",
    "request": "launch",
    "port": 9005,
    "runtimeArgs": [
      "-dxdebug.start_with_request=yes"
    ],
    "env": {
      "XDEBUG_MODE": "debug,develop",
      "XDEBUG_CONFIG": "client_port=${port}"
    },      
    "pathMappings": {
      //path-folder-in-docker: path-in-host-machine
      "/code": "/Users/ioedu/projects/prj_docker_imgs/xnp-xdebug/app"
    },
    "xdebugSettings": {
      "max_data": 65535,
      "show_hidden": 1,
      "max_children": 100,
      "max_depth": 5
    }
  },
]
```

# result
![](https://resources.theframework.es/eduardoaf.com/20221117/205113-vscode-xdebug-docker.png)