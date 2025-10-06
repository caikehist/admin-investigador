<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Mission_model');
    }

    // Função para listar todos os projetos
    public function get_projects() {
        $query = $this->db->get('projects');
        return $query->result();
    }

    // Função para obter um projeto específico
    public function get_project($id) {
        $query = $this->db->get_where('projects', array('id' => $id));
        return $query->row();
    }

    public function get_project_by_name($name){
        $query = $this->db->get_where('projects', ['name'=>$name]);
        return $query->row();
    }

    // Função para inserir um novo projeto
    public function insert_project($data) {
        $this->db->insert('projects', $data);
        $project_id = $this->db->insert_id();

        $mission_id = $this->Mission_model->get_mission_by_project($project_id);

        // Lógica para verificar se existe missão com esse 'project_id'
        

        if(!$mission_id){
            
            $this->db->insert('missions', [
                'project_id'    => $project_id,
                'name'          => 'MISSÃO 1: DESVENDANDO O PASSADO',
                'desc'          => 'MISSÃO 1: "Desvendando o Passado"
Olá, Exploradores do Tempo!
Sua primeira missão na nossa grande aventura pelo patrimônio cultural é se tornar um verdadeiro desbravador do conhecimento! Vocês serão os primeiros a desvendar os segredos da nossa cidade.
O Objetivo: Realizar um levantamento da História oficial do nosso município.
As Equipes: A turma será dividida em duas equipes, prontas para a competição! Lembrem-se: o trabalho em equipe é fundamental para o sucesso.
As Fases da Missão:
    1. A Pista Principal: O primeiro lugar para começar a investigação é o site oficial do nosso município. Procurem por seções como "História", "Sobre a Cidade" ou "Nossa História".
    2. O Livro de Registros: Em seguida, vocês devem pesquisar no site do IBGE. Lá, encontrarão informações oficiais sobre a fundação, população e outros fatos importantes.
O Desafio Bônus:
Durante todas as etapas da sua pesquisa, o mais importante é documentar a jornada! Cada foto que você tirar do momento em que estiver pesquisando — seja no computador, no celular ou no tablet — vale 1 ponto!
A pontuação é individual, então capriche no registro de cada descoberta. Ao final da missão, a equipe com a maior pontuação ganhará o título de "Guardiões da História do Bairro".
Preparados para essa aventura? O relógio está correndo!',
                'status'        => 'NÃO ATRIBUÍDA',
            ]);

            $this->db->insert('missions', [
                'project_id'    => $project_id,
                'name'          => 'MISSÃO 2: CAÇADORES DE MEMÓRIA',
                'desc'          => 'MISSÃO 2: "Caçadores de Memória"
Parabéns, desbravadores, por concluírem a primeira missão! Agora que vocês já conhecem os fatos e datas oficiais da nossa cidade, é hora de ir em busca das verdadeiras histórias, aquelas que moram nas lembranças das pessoas!
O Objetivo: Coletar imagens, fotos, documentos e depoimentos que revelam a memória do nosso bairro, vista pelos olhos de quem viveu (e vive) aqui.
As Pistas: A memória local está por toda parte, basta saber procurar. Para esta missão, o foco será nos primeiros tempos do bairro. Pensem em:
    • Pioneiros e suas histórias de vida.
    • Fotos da primeira igreja, da construção mais antiga ou do primeiro comércio.
    • Documentos que mostram como o bairro era antigamente.
    • Depoimentos de quem viu o bairro crescer.
O Desafio: O que vale é a descoberta! Cada foto, documento ou depoimento que você conseguir coletar vale 1 ponto. Lembre-se, o objetivo não é apenas encontrar, mas também registrar a história por trás de cada item.
Regras Especiais: Qualquer tipo de evidência de memória é válida e será bem-vinda na nossa exposição. Quanto mais você trouxer, mais pontos individuais você acumula para a sua equipe.
Vamos lá! O passado está esperando para ser contado através de vocês!',
                'status'        => 'NÃO ATRIBUÍDA',
            ]);

            $this->db->insert('missions', [
                'project_id'    => $project_id,
                'name'          => 'MISSÃO 3: GUARDIÕES DO CONHECIMENTO',
                'desc'          => 'MISSÃO 3: "Guardiões do Conhecimento"
Exploradores, a jornada continua! Agora que vocês já desvendaram a história oficial e as memórias do bairro, é hora de organizar esse conhecimento e se tornar especialistas.
O Objetivo: Construir nossa própria enciclopédia do patrimônio, uma Wiki, para registrar tudo o que estamos aprendendo.
As Equipes: A turma será dividida em três equipes. Cada equipe será responsável por se aprofundar em um conceito fundamental do nosso projeto. Os grupos de pesquisa são:
    1. Grupo A: "O que é Patrimônio?"
    2. Grupo B: "O que é Patrimônio Histórico?"
    3. Grupo C: "O que são Patrimônio Cultural Material e Patrimônio Cultural Imaterial?"
O Desafio: Seu desafio é pesquisar e inserir os resultados do seu levantamento na nossa Wiki. Cada conceito que vocês explicarem, com suas próprias palavras e exemplos, vai ajudar toda a turma a entender melhor o tema.
Lembrem-se de que a colaboração e a organização são essenciais. O grupo que trouxer a explicação mais clara e completa será o "Guardião do Conhecimento" da nossa missão.
Vamos lá! É hora de construir o nosso próprio acervo de sabedoria.',
                'status'        => 'NÃO ATRIBUÍDA',
            ]);

            $this->db->insert('missions', [
                'project_id'    => $project_id,
                'name'          => 'MISSÃO 4: O CAÇADOR DE DETALHES',
                'desc'          => 'MISSÃO 4: "O Caçador de Detalhes"
Equipe de Expedição, atenção! Vocês já são especialistas em história e em memória. Agora é hora de treinar o olhar e se tornar verdadeiros detetives visuais do nosso bairro.
O Objetivo: Fotografar os pequenos detalhes que contam as grandes histórias da nossa arquitetura.
O Desafio: Percorram o bairro em busca de elementos que se destacam, como:
    • Casas antigas de madeira e de alvenaria.
    • Janelas e portas com desenhos ou cores diferentes.
    • Detalhes na fachada de igrejas.
    • Placas, postes ou qualquer objeto que pareça contar uma história.
O importante é capturar a essência do lugar através desses detalhes. Cada foto tirada com atenção e criatividade vale 1 ponto. A equipe que encontrar os detalhes mais impressionantes e únicos será a vencedora desta missão!
Prontos para essa jornada? O bairro está esperando para ter seus segredos revelados pelo olhar de vocês.',
                'status'        => 'NÃO ATRIBUÍDA',
            ]);

            $this->db->insert('missions', [
                'project_id'    => $project_id,
                'name'          => 'MISSÃO 5: VOZES DA ESCOLA E DO BAIRRO',
                'desc'          => 'MISSÃO 5: "Vozes da Escola e do Bairro"
Exploradores, é hora de ouvir o passado! Vocês já registraram a história oficial, os detalhes arquitetônicos e as memórias da família. Agora, o próximo desafio é encontrar uma "fonte viva" de histórias!
O Objetivo: Encontrar um morador antigo do bairro - alguém que já estudou ou que ainda mora na região - e registrar um depoimento em áudio ou vídeo.
O Desafio:
    1. Encontre a Fonte: Peça a ajuda da sua família ou procure por pessoas mais velhas no seu bairro.
    2. Faça as Perguntas Certas: Pergunte sobre como era a escola, as brincadeiras, os comércios antigos ou as festas do bairro.
    3. Grave o Depoimento: Use seu celular ou um gravador para registrar a entrevista em áudio ou vídeo. O depoimento pode ser curto, mas deve ser rico em detalhes e lembranças.
Pontuação: Cada depoimento bem-sucedido vale 5 pontos para a sua pontuação individual! Lembre-se de ser educado e agradecer a pessoa por compartilhar suas memórias.
Essa missão vai nos ajudar a construir a história do bairro com as vozes de quem realmente a viveu. Boa sorte!',
                'status'        => 'NÃO ATRIBUÍDA',
            ]);

            $this->db->insert('missions', [
                'project_id'    => $project_id,
                'name'          => 'MISSÃO 6: A RECEITA DE FAMÍLIA',
                'desc'          => 'MISSÃO 6: "A Receita de Família"
Chefs e Cozinheiros do Conhecimento, hora de colocar a mão na massa! Vocês já registraram a história do bairro, mas agora é a vez de saborear o que faz parte da memória da nossa comunidade.
O Objetivo: Registrar em foto ou vídeo uma receita tradicional da sua família. Não precisa ser algo que passa por várias gerações, basta ser um prato que vocês fazem e que tem um significado especial.
O Desafio:
    1. Escolha a Receita: Pense em um prato que a sua família adora preparar. Pode ser um bolo de aniversário, um almoço de domingo ou até mesmo um lanche rápido que todo mundo gosta.
    2. Documente: Tire fotos dos ingredientes, do passo a passo ou do prato finalizado. Se quiser, grave um vídeo mostrando a receita sendo feita!
    3. Conte a História: Junto com o registro, conte o porquê dessa receita ser especial. Ela te lembra de quem? De qual momento?
Pontuação: Cada foto ou vídeo enviado vale 5 pontos para a sua pontuação individual. Essa missão vai nos mostrar que o patrimônio cultural também pode ser saboreado!
Prontos para essa missão deliciosa?',
                'status'        => 'NÃO ATRIBUÍDA',
            ]);

        } 

        return $project_id;
    }

    // Função para atualizar um projeto
    public function update_project($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('projects', $data);
    }

    // Função para deletar uma missão
    public function delete_mission($id) {
        $this->db->where('id', $id);
        return $this->db->delete('missions');
    }
}