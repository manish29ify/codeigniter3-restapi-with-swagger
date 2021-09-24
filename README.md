## CodeIginter Rest Server With Swagger

This setup is built on top of [CodeIgniter 3 Framework](https://codeigniter.com/userguide3/index.html) by using [chriskacerguis/codeigniter-restserver](https://github.com/chriskacerguis/codeigniter-restserver) and [zircote/swagger-php ^3.2](https://github.com/zircote/swagger-php).

For more details please visit [Document](https://github.com/manish29ify/codeigniter3-restapi-with-swagger/wiki)

### Installation

clone source code in you server using command in terminal (first verify git cli installation) or you can directly download scouce code [From Here](https://github.com//manish29ify/codeigniter3-restapi-with-swagger/archive/refs/heads/main.zip)

```
git clone https://github.com/manish29ify/codeigniter3-restapi-with-swagger.git
```

### Remaining Setup
```
1. Change base_url in file application/config/config.php
2. Change url in file application/controllers/openapi/openapi.server.php
3. In case you get error like "Class 'RestController' not found" then add below at the top of your controller file
include_once("./application/core/MY_Controller.php");
```


[Link](url) and ![Image](src)
```

For more details see [GitHub Flavored Markdown](https://guides.github.com/features/mastering-markdown/).

### Jekyll Themes

Your Pages site will use the layout and styles from the Jekyll theme you have selected in your [repository settings](https://github.com/manish29ify/codeigniter3-restapi-with-swagger/settings/pages). The name of this theme is saved in the Jekyll `_config.yml` configuration file.

### Support or Contact

Having trouble with Pages? Check out our [documentation](https://docs.github.com/categories/github-pages-basics/) or [contact support](https://support.github.com/contact) and we’ll help you sort it out.
