import { NgModule } from "@angular/core";
import { BrowserModule } from "@angular/platform-browser";
import { SharedModule } from "./shared/shared.module";

import { ManagerComponent } from "./manager.component";
import { ProgressBarComponent } from "./upload/progress-bar.component";
import { TreeComponent } from "./tree/tree.component";
import { UploadComponent } from "./upload/upload.component";

import { FileValueAccessor } from "./upload/validation/file-value-accessor.directive";
import { RequiredFileValidator } from "./upload/validation/required-file.validator";

const DECLARATIONS: any = [
  // Component
  ManagerComponent,
  ProgressBarComponent,
  TreeComponent,
  UploadComponent,

  // Validation
  FileValueAccessor,
  RequiredFileValidator,
];

@NgModule({
  imports: [
    BrowserModule,
    SharedModule.forRoot(),
  ],
  declarations: [
    ...DECLARATIONS,
  ],
  exports: [
    ...DECLARATIONS,
  ],
  bootstrap: [ManagerComponent]
})
export class ManagerModule { }