// Manages beer API data calls
class Beers {
  constructor() {
    this.endPoint = "http://localhost:8000/endpoint.php";
  }

  /**
   * Returns the api data of all beers
   */
  async getBeers() {
    const url = `${this.endPoint}?request=getBeers`;
    const result = await this.sendRequest(url);
    return result
  }
  
  /**
   * Return the api data of selected beer 
   * @param {Integer} beerId is a selected beer id
   */
  async getBeer(beerId) {
    const url = `${this.endPoint}?request=getBeer&id=${beerId}`;
    const result = await this.sendRequest(url);
    return result
  }

  /**
   * Send request to api
   * @param {String} url is the url sent
   */
  async sendRequest(url) {
    let apiData = [];
    try {
      const res = await fetch(url);
      if (! res.ok) throw new Error(res.status);
      const data = await res.json();
      if (data.length) apiData = data;
    } catch (error) {
      console.log(error);
    }
    return await apiData;
  }
}
