<?php
namespace Core;
class Routers
{
    protected $routers=[];

    protected $params;

    public function add($route,$param)
    {
        $route=preg_replace('/^\//','',$route);
        $route=preg_replace('/\//','\\/',$route);
        $route=preg_replace('/\{([a-z]+)\}/','(?<\1>[a-z0-9]+)',$route);
        $route='/^'.$route.'$/';
        $param=explode('@',$param);
        $this->routers[$route]=$param;
    }

    public function match($url)
    {
        $url = $this->GetArayye($url);
        foreach ($this->routers as $route=>$param){
            if ($url==null&&$_SERVER['QUERY_STRING']==''){
                $url='/';
            }
            if (preg_match($route,$url,$matches)){

                foreach ($matches as $key=>$match){
                    if ($key!=0){
                        $param['params']=$matches['id'];
                    }else{
                        $param['params']='';
                    }
                }
                $this->params=$param;
                return true;
            }
        }
        return false;
    }

    public function getRouter()
    {
        return $this->routers;
    }

    public function getPrams()
    {
        return $this->params;
    }

    public function dispatch($url){

        if ($this->match($url)){

            $contolorel=$this->params[0];
            $contolorel='App\Contorol\\'.$contolorel;

            if (class_exists($contolorel)){
                $contoroler_object=new $contolorel;
                $Methode=$this->params[1];

                if (is_callable([$contoroler_object,$Methode])){
                    echo call_user_func_array([$contoroler_object,$Methode],[$this->params['params']]);
                }else{
                    echo 'Not Found Method '.$Methode.' && Contorol '.$contoroler_object;

                }
            }else{
                throw new \Exception("not found class {$contolorel}",500);
                exit;
            }


        }else{
            throw new \Exception("not found {$url}",404);
            exit;

        }
    }

    public function GetArayye($url)
    {
        if ($url!=''){
           $part= $url =explode('&',$url,2);
           if (strpos($part[0],'=')==false){
               $url=$part[0];
//               var_dump($part[0]);
           }else{
               $url='';
           }
           return $url;
        }
    }
}