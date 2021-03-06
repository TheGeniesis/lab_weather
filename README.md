# Metric application

![PHP 7.4](https://img.shields.io/badge/PHP-7.4-green)
![SYMFONY 4,4](https://img.shields.io/badge/SYMFONY-4.4-green)

This application was created to show an example integration [Prometheus](http://prometheus.io) with [Symfony](https://symfony.com/) 4 Framework

The Application logic is created to add some scenarios like many database queries, slow endpoints, etc.

Endpoints:

| Method | Routing         | Description                |
|--------|-----------------|----------------------------|
| POST   | /data           | Send weather data          |

## Pre-requirements

- [Docker](https://www.docker.com/)
- [Docker-compose](https://docs.docker.com/compose/)
- [Task](https://taskfile.dev)

> Application wasn't tested on Windows

## Setup

### Kubernetes based version

#### Installation

- Run `task init`

#### Run application

- [Setup kubernetes environment](/devops/README.md)
- Run `task kubeconfig`
- Run `task start`
- Open `http://localhost` to check if works
- If you get `502 Bad Gateway`, please wait little longer. Application needs a moment to wake up
- To generate some example traffic use [prepared stress tests project](/tests/README.md)

### Docker-based version

#### Installation

- Run `task docker-init`

#### Run application

- Run `task docker-start`
- Open `http://localhost:8081` to check if works
- To generate some example traffic use [prepared stress tests project](/tests/README.md)

> To see Grafana and prometheus panel you need to use Kubernetes version

### Remove application

- Run `task remove-dev`
