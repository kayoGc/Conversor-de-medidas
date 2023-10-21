<?php 
    class Conversor{
        protected float $numero = 0;
        protected string $de = '';
        protected string $para = '';
        protected float $resultado = 0;
        protected string $optionsDe = '';
        protected string $optionsPara = '';
        protected string $mensagem = '';
        private array $medidas = array(
            'metro(s)',
            'quilometro(s)',
            'centímetro(s)',
            'milimetro(s)'
        );

        // para fazer multiplos construtores já que o php não suporta
        public function __construct() {
            $argumentos = func_get_args();
            $numeroDeArgumentos = func_num_args();
            if (method_exists($this, $funcao = '__construct' . $numeroDeArgumentos)) {
                call_user_func_array(array($this, $funcao), $argumentos);
            }
        }

        public function __construct0(){
            $this->gerarOptionsMedida();
            $this->calcular();
            $this->gerarMensagem();
        }
        
        public function __construct3(float $numero = null, string $de = null, string $para = null) {
            $this->numero = $numero != null ? $numero : 0;
            $this->de = $de != null ? $de : 'null';
            $this->para = $para != null ? $para : 'null';
            $this->gerarOptionsMedida($this->de, $this->para);
            $this->resultado = $this->calcular();
            $this->gerarMensagem($numero, $de, $para, $this->resultado);
        }

        private function gerarOptionsMedida(string $de = null, string $para = null) {
            // Options do De
            foreach ($this->medidas as $medida) {
                $this->optionsDe .= $de == $medida ? "<option value='{$medida}' selected='selected'>{$medida}</option>" : "<option value='{$medida}'>{$medida}</option>";
            }
            // Options do para
            foreach ($this->medidas as $medida) {
                $this->optionsPara .= $para == $medida ? "<option value='{$medida}' selected='selected'>{$medida}</option>" : "<option value='{$medida}'>{$medida}</option>";
            }
        }

        private function gerarMensagem(float $num = null, string $de = null, string $para = null, float $resultado = null) {
            $this->mensagem = isset($num) ? "{$num} {$de} equivale a {$resultado} {$para}" : '';
        }

        private function calcular(){
            switch($this->de){
                case "metro(s)":
                    switch($this->para) {
                        case 'quilometro(s)': return $this->numero /1000; break;
                        case 'centímetro(s)': return $this->numero * 100;  break;
                        case 'milimetro(s)': return $this->numero * 1000; break;
                        default: return $this->numero; break;
                    }
                    break;
                case 'quilometro(s)':
                    switch($this->para) {
                        case 'metro(s)': return $this->numero * 1000; break;
                        case 'centímetro(s)': return $this->numero * 100000; break;
                        case 'milimetro(s)': return $this->numero * 1000000; break;
                        default: return $this->numero;
                    } 
                    break;
                case 'centímetro(s)':
                    switch($this->para) {
                        case 'metro(s)': return $this->numero / 100; break;
                        case 'milimetro(s)': return $this->numero * 10; break;
                        case 'quilometro(s)': return $this->numero / 100000; break;
                        default: return $this->numero * 1; break;
                    }
                    break;
                case 'milimetro(s)':
                    switch($this->para) {
                        case 'metro(s)': return $this->numero / 100; break;
                        case 'centímetro(s)': return $this->numero / 10; break;
                        case 'quilometro(s)': return $this->numero / 1000000; break;
                        default: return $this->numero; break;
                    }
                    break;
            }
        }

        public function getNumero() {
            return $this->numero;
        }

        public function getResultado(){
            return $this->resultado;
        }

        public function getOptionsDe() {
            return $this->optionsDe;
        }

        public function getOptionsPara() {
            return $this->optionsPara;
        }

        public function getMensagem() {
            return $this->mensagem;
        }
    }
?>