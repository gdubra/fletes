<?php
namespace Ana\AgendaBundle\Extensions\DQL;
use \Doctrine\ORM\Query\AST\Functions\FunctionNode;
use \Doctrine\ORM\Query\Lexer;
/**
 * 
 * @uses FunctionNode
 * @author Simone Fumagalli - www.iliveinperego.com
 */
class DateFormatDQL extends FunctionNode
{
    
    /*
    * holds the date of the DATE_FORMAT statement
    * @var mixed
    */
    protected $dateExpression;
    
    /**
    * holds the '%format' parameter of the DATE_FORMAT statement
    * @var string
    */
    protected $formatChar;
    
    /**
     * getSql
     *
     * @param \Doctrine\ORM\Query\SqlWalker $sqlWalker
     * @access public
     * @return string
     */
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
//         return 'DATE_FORMAT(' .
//         $this->dateExpression->dispatch($sqlWalker) . ', ' .
//         $this->formatChar->dispatch($sqlWalker) ;
        return 'DATE_FORMAT(' .
                $sqlWalker->walkArithmeticExpression($this->dateExpression) .
                ','.
                $sqlWalker->walkStringPrimary($this->formatChar) .
                ')';
    }
    /**
     * parse
     *
     * @param \Doctrine\ORM\Query\Parser $parser
     * @access public
     * @return void
     */
    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
//         $parser->match(Lexer::T_IDENTIFIER);
//         $parser->match(Lexer::T_OPEN_PARENTHESIS);
//         $this->dateExpression = $parser->ArithmeticPrimary();
//         $parser->match(Lexer::T_COMMA);
//         $this->formatChar = $parser->ArithmeticPrimary();
//         $parser->match(Lexer::T_CLOSE_PARENTHESIS);
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        
        $this->dateExpression = $parser->ArithmeticExpression();
        $parser->match(Lexer::T_COMMA);
        
        
        $this->formatChar = $parser->StringPrimary();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
