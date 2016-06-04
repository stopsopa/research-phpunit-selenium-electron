# setx ABSO_DOCKER_IP "x.x.x.x"
# vagrant up —no-parallel
# alias phpunit="docker run --add-host dbmysql.absolvent.pl:172.21.1.3 -it -w /var/www/html -v /vagrant:/var/www/html drupaldocker/php:5.6-cli php ./vendor/bin/phpunit --stop-on-failure"
# alias artisan="docker run --add-host dbmysql.absolvent.pl:172.21.1.3 -it -w /var/www/html -v /vagrant:/var/www/html drupaldocker/php:5.6-cli php artisan"

Vagrant.configure("2") do |config|
  # config.vm.define "elasticsearch" do |elasticsearch|
    # elasticsearch.vm.provider "docker" do |docker|
      # docker.force_host_vm = true
      # docker.image = "elasticsearch"
      # docker.ports = ["9200:9200", "9300:9300"]
      # docker.remains_running = true
      # docker.vagrant_vagrantfile = "./Vagrantfile.docker"
    # end
  # end

  config.vm.define "mysql" do |mysql|
    mysql.vm.provider "docker" do |docker|
      docker.env = {
        "MYSQL_DATABASE" => "homestead",
        "MYSQL_PASSWORD" => "secret",
        "MYSQL_ROOT_PASSWORD" => "secret",
        "MYSQL_USER" => "homestead",
      }
      docker.force_host_vm = true
      docker.image = "mysql"
      docker.name = "mysql"
      docker.ports = ["3306:3306"]
      docker.remains_running = true
      docker.vagrant_vagrantfile = "./Vagrantfile.docker"
    end
  end

  # config.vm.define "php" do |php|
    # php.vm.provider "docker" do |docker|
      # docker.link("mysql:mysql")

      # docker.cmd = ["php", "/app/artisan", "serve", "--host=0.0.0.0", "--port=80"]
      # docker.force_host_vm = true
      # docker.image = "drupaldocker/php:7"
      # docker.ports = ["80:80"]
      # docker.remains_running = true
      # docker.vagrant_vagrantfile = "./Vagrantfile.docker"
      # docker.volumes = ["/vagrant:/app"]
    # end
  # end
end
