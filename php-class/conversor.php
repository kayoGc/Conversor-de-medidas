<?php 
    class Conversor{
        protected float $numero = 0;
        protected string $de;
        protected string $para;
        protected float $resultado = 0;
        private array $medidas = array(
            'metro(s)',
            'quilometro(s)',
            'centímetro(s)',
            'milimetro(s)'
        );

        public function colocarValores(float $numero, string $de, string $para) {
            $this->numero = $numero;
            $this->de = $de;
            $this->para = $para;
        }

        public function gerarOptionsMedida(string $de = 'nao', string $para = 'nao') {
            return $options = array(
                'de' => $this->gerarOptionsMedidaDe($de),
                'para' => $this->gerarOptionsMedidaPara($para)
            );
        }

        private function gerarOptionsMedidaDe(string $de) {
            $options = '';
            foreach ($this->medidas as $medida) {
                $de == $medida ?$options .= "<option value='{$medida}' selected='selected'>{$medida}</option>" : $options .= "<option value='{$medida}'>{$medida}</option>";
            }
            return $options;
        }

        private function gerarOptionsMedidaPara(string $para) {
            $options = '';
            foreach ($this->medidas as $medida) {
                $para == $medida ?$options .= "<option value='{$medida}' selected='selected'>{$medida}</option>" : $options .= "<option value='{$medida}'>{$medida}</option>";
            }
            return $options;
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

        public function fazerResultado() {
            $this->resultado = $this->calcular();
        }

        public function getResultado(){
            return $this->resultado;
        }
    }
?>