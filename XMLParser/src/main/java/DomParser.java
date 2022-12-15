import java.io.File;
import java.util.Map;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.DocumentBuilder;
import org.w3c.dom.Document;
import org.w3c.dom.NamedNodeMap;
import org.w3c.dom.NodeList;
import org.w3c.dom.Node;



public class DomParser{

    public static void main (String[] args) {
        System.out.println("passa");
        try{
            File file = new File("src/main/xml/es3.xml");
            DocumentBuilder dBuilder = DocumentBuilderFactory.newInstance().newDocumentBuilder();
            Document doc = dBuilder.parse(file);
            System.out.println("Root element :" + doc.getDocumentElement().getNodeName());
            if(doc.getChildNodes().item(1).hasAttributes()){
                NamedNodeMap m1 = doc.getChildNodes().item(1).getAttributes();
                for(int i = 0; i < m1.getLength(); i++){
                    System.out.println(m1.item(i).getNodeName() + " = " + m1.item(i).getNodeValue());
                }
            }
            if(doc.hasChildNodes()){
                printNode(doc.getChildNodes().item(1).getChildNodes());
            }
        } catch( Exception e){
            System.out.println(e.getMessage());
        }
    
    }
    
    
    
    private static void printNode(NodeList nodeList) {
        //System.out.println(nodeList.getLength());
        for (int count = 0; count < nodeList.getLength(); count++) {
            Node tempNode = nodeList.item(count);
            //System.out.println( tempNode.getNodeName()+ " ha figli " + tempNode.hasChildNodes() );
            if(tempNode.getNodeType() == Node.ELEMENT_NODE){
                
                if(nodeList.getLength() == 1){
                    System.out.println(tempNode.getNodeName() + " contiene : ");
                }else{
                    System.out.print(tempNode.getNodeName() + " -> ");
                }
                if(tempNode.hasAttributes()){
                    NamedNodeMap m1 = tempNode.getAttributes();
                    for(int i = 0; i < m1.getLength(); i++){
                        System.out.println(m1.item(i).getNodeName() + " = " + m1.item(i).getNodeValue());
                    }
                }
                printNode(tempNode.getChildNodes());

            }else{
                //String format = "%-20s %5d\n";
                System.out.println(tempNode.getTextContent());
                //System.out.printf(format, tempNode.getTextContent() );
            }
        }
    }


}
