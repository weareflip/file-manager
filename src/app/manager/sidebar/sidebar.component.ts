import { Component, OnInit } from "@angular/core";
import { FilesystemService } from "../filesystem/filesystem.service";
import { Directory } from "../filesystem/directory";

@Component({
  selector: 'sidebar',
  templateUrl: './sidebar.component.html'
})
export class SidebarComponent implements OnInit {
  public system: Directory;

  constructor(
    public filesystem: FilesystemService
  ) { }

  ngOnInit(): void {
    this.filesystem.getFullList().then((system: Directory) => {
      console.log(system, system.name);
      this.system = system
    });
  }
}
