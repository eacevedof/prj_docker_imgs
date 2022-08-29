```bash
# brew install sonnar-scanner
# con alias
# /usr/local/Cellar/sonar-scanner/4.7.0.2747/bin/sonar-scanner 

sonar \
  -Dsonar.projectKey=xxxx \
  -Dsonar.sources=. \
  -Dsonar.host.url=http://localhost:3500 \
  -Dsonar.login=yyy
```
